<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\DeathClaim;
use App\Models\Family;
use App\Models\FamilyName;
use App\Models\Insurance;
use App\Models\InsuranceClaim;
use App\Models\Member;
use App\Models\PackageInsuranceCoverage;
use App\Models\PackageInsuranceDetail;
use App\Models\User;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class InsuranceClaimApiController extends Controller
{
    protected $random;

    public function __construct()
	{
		$this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
	}

    public function index(Request $request){
        if($request->slug){
            $insurance = Insurance::first();
            $insurance['claims'] = InsuranceClaim::with(['insurance.insurancetype','user','claim'])->where('slug',$request->slug)->first();
        }else{
            $insurance = Insurance::first();
            $insurance['claims'] = InsuranceClaim::where('user_id',Auth::user()->id)->orWhere('claiming_user_id',Auth::user()->id)->with(['insurance.insurancetype','user','claim'])->get();
        }
        return response()->json($insurance);
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'hand_written_letter' => 'required',
                'medical_report' => 'required',
                'invoice' => 'required',
            ]);
            $packageDetails = PackageInsuranceDetail::where('user_id',Auth::user()->id)->first();
            $claims = InsuranceClaim::where('user_id',Auth::user()->id)->where('package_insurance_id',$request->package_insurance_id)->where('userpackage_id',$packageDetails->userpackage_id)->whereNotIn('insurance_status',['Claim Settelled','Rejected'])->first();
            if($claims){
                return response()->json(['message' => [
                    'error' => ['You already have an in-progress insurance claim settlement.']
                ]],400);
            }else{
                $claims = InsuranceClaim::where('user_id',Auth::user()->id)->where('package_insurance_id',$request->package_insurance_id)->where('userpackage_id',$packageDetails->userpackage_id)->where('insurance_status','Claim Settelled')->get()->sum('claim_amount');
                $packageInsurance = PackageInsuranceCoverage::find($request->package_insurance_id);
                $remaining = $packageInsurance->amount - $claims;
                if($remaining <= 0){
                    return response()->json(['message' => [
                        'error' => ['You have already exceeded the insurance coverage.']
                    ]],400);
                }
                elseif($request->claim_amount > $remaining){
                    return response()->json(['message' => [
                        'error' => ['Claim amount cannot be greater than '. $remaining.'.']
                    ]],400);
                }else{
                    $insuranceClaim = new InsuranceClaim();
                    $insuranceClaim->user_id = Auth::user()->id;
                    $insuranceClaim->userpackage_id = $packageDetails->userpackage_id;
                    $insuranceClaim->package_insurance_id = $request->package_insurance_id;
                    $insuranceClaim->claim_amount = $request->claim_amount;
                    if ($request->hand_written_letter) {
                        $image = $request->hand_written_letter;
                        if(env('STORAGE_TYPE') == 'minio'){
                            $destinationPath = 'images/';
                            $imageUpload = Helper::minio_upload($image, $destinationPath); 
                            $insuranceClaim->hand_written_letter_path = $imageUpload['path'];
                            $insuranceClaim->hand_written_letter = $imageUpload['file'];
                        }else{
                            $folderPath = "storage/images/"; //path location                
                            $imageUpload = Helper::native_upload($image,$folderPath);                    
                            $insuranceClaim->hand_written_letter_path = $imageUpload['path'];
                            $insuranceClaim->hand_written_letter = $imageUpload['file'];
                        }
                    }
                    if ($request->medical_report) {
                        $image = $request->medical_report;
                        if(env('STORAGE_TYPE') == 'minio'){
                            $destinationPath = 'images/';
                            $imageUpload = Helper::minio_upload($image, $destinationPath); 
                            $insuranceClaim->medical_report_path = $imageUpload['path'];
                            $insuranceClaim->medical_report = $imageUpload['file'];
                        }else{
                            $folderPath = "storage/images/"; //path location                
                            $imageUpload = Helper::native_upload($image,$folderPath);                    
                            $insuranceClaim->medical_report_path = $imageUpload['path'];
                            $insuranceClaim->medical_report = $imageUpload['file'];
                        }
                    }
                    if ($request->invoice) {
                        $image = $request->invoice;
                        if(env('STORAGE_TYPE') == 'minio'){
                            $destinationPath = 'images/';
                            $imageUpload = Helper::minio_upload($image, $destinationPath); 
                            $insuranceClaim->invoice_path = $imageUpload['path'];
                            $insuranceClaim->invoice = $imageUpload['file'];
                        }else{
                            $folderPath = "storage/images/"; //path location                
                            $imageUpload = Helper::native_upload($image,$folderPath);                    
                            $insuranceClaim->invoice_path = $imageUpload['path'];
                            $insuranceClaim->invoice = $imageUpload['file'];
                        }
                    }
                    $name = str_replace(' ', '-', $insuranceClaim->insurance->insurancetype->type);
                    $insuranceClaim->slug = 'insurance-claim-'.$name.'-'.$this->random;
                    $saved = $insuranceClaim->save();
                    if($saved){
                        return response()->json(["message" => "success"]);
                    }
                }
            }
        }catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ],400);
        }        
    }

    public function details(){
        $member = Member::where('member_id',Auth::user()->id)->first();
        if($member->member_type == 'Primary Member'){
            $familyname = FamilyName::where('primary_member_id',$member->id)->first();
            $families = Family::where('family_id',$familyname->id)->get()->pluck('member_id');
            $members = Member::whereIn('id',$families)->with('user')->whereHas('user.insurance',function($query){
                $query->where('status',1);
            })->get();
            $userpackage = UserPackage::where('familyname_id',$familyname->id)->where('package_status','Activated')->latest()->first();
            if($userpackage){
                $packageInsurance = PackageInsuranceCoverage::where('package_id',$userpackage->package_id)->with('insurancetype')->whereHas('insurancetype',function($query){
                    $query->where('is_death_insurance',1);
                })->get();
            }else{
                $packageInsurance = [];
            }
        }elseif($member->member_type == 'Dependent Member'){
            $family = Family::where('member_id',$member->id)->first();
            $familyname = FamilyName::find($family->family_id);
            $families = Family::where('family_id',$family->family_id)->where('id','!=',$family->id)->get()->pluck('member_id');
            $mergeMembers = $families->push($familyname->primary_member_id);
            $members = Member::whereIn('id',$mergeMembers)->with('user')->whereHas('user.insurance',function($query){
                $query->where('status',1);
            })->get();
            $userpackage = UserPackage::where('familyname_id',$familyname->id)->where('package_status','Activated')->latest()->first();
            if($userpackage){
                $packageInsurance = PackageInsuranceCoverage::where('package_id',$userpackage->package_id)->with('insurancetype')->whereHas('insurancetype',function($query){
                    $query->where('is_death_insurance',1);
                })->get();
            }else{
                $packageInsurance = [];
            }
        }
        return response()->json(['members' => $members,'insurance_types' => $packageInsurance]);
    }

    public function deathClaimStore(Request $request)
    {
        try{
            $request->validate([
                'user_id' => 'required',
                'hand_written_letter' => 'required',
                'medical_report' => 'required',
                'invoice' => 'required',
            ]);
            $packageDetails = PackageInsuranceDetail::where('user_id',Auth::user()->id)->first();
            $claims = InsuranceClaim::where('package_insurance_id',$request->package_insurance_id)->where('user_id',$request->user_id)->where('userpackage_id',$packageDetails->userpackage_id)->latest()->first();
            if($claims){
                if($claims->insurance_status != 'Claim Settelled' && $claims->insurance_status != 'Rejected'){
                    return response()->json(['message' => [
                        'error' => ['You already have an in-progress insurance claim settlement.']
                    ]],400);
                }elseif($claims->insurance_status == 'Claim Settelled'){
                    return response()->json(['message' => [
                        'error' => ["This user's insurance has already been claimed."]
                    ]],400);
                }else{
                    $packageInsurance = PackageInsuranceCoverage::find($request->package_insurance_id);
                    $insuranceClaim = new InsuranceClaim();
                    $insuranceClaim->user_id = $request->user_id;
                    $insuranceClaim->userpackage_id = $packageDetails->userpackage_id;
                    $insuranceClaim->claiming_user_id = Auth::user()->id;
                    $insuranceClaim->package_insurance_id = $request->package_insurance_id;
                    $insuranceClaim->claim_amount = $packageInsurance->amount;
                    if ($request->hand_written_letter) {
                        $image = $request->hand_written_letter;
                        if(env('STORAGE_TYPE') == 'minio'){
                            $destinationPath = 'images/';
                            $imageUpload = Helper::minio_upload($image, $destinationPath); 
                            $insuranceClaim->hand_written_letter_path = $imageUpload['path'];
                            $insuranceClaim->hand_written_letter = $imageUpload['file'];
                        }else{
                            $folderPath = "storage/images/"; //path location                
                            $imageUpload = Helper::native_upload($image,$folderPath);                    
                            $insuranceClaim->hand_written_letter_path = $imageUpload['path'];
                            $insuranceClaim->hand_written_letter = $imageUpload['file'];
                        }
                    }
                    if ($request->medical_report) {
                        $image = $request->medical_report;
                        if(env('STORAGE_TYPE') == 'minio'){
                            $destinationPath = 'images/';
                            $imageUpload = Helper::minio_upload($image, $destinationPath); 
                            $insuranceClaim->medical_report_path = $imageUpload['path'];
                            $insuranceClaim->medical_report = $imageUpload['file'];
                        }else{
                            $folderPath = "storage/images/"; //path location                
                            $imageUpload = Helper::native_upload($image,$folderPath);                    
                            $insuranceClaim->medical_report_path = $imageUpload['path'];
                            $insuranceClaim->medical_report = $imageUpload['file'];
                        }
                    }
                    if ($request->invoice) {
                        $image = $request->invoice;
                        if(env('STORAGE_TYPE') == 'minio'){
                            $destinationPath = 'images/';
                            $imageUpload = Helper::minio_upload($image, $destinationPath); 
                            $insuranceClaim->invoice_path = $imageUpload['path'];
                            $insuranceClaim->invoice = $imageUpload['file'];
                        }else{
                            $folderPath = "storage/images/"; //path location                
                            $imageUpload = Helper::native_upload($image,$folderPath);                    
                            $insuranceClaim->invoice_path = $imageUpload['path'];
                            $insuranceClaim->invoice = $imageUpload['file'];
                        }
                    }
                    $name = str_replace(' ', '-', $insuranceClaim->insurance->insurancetype->type);
                    $insuranceClaim->slug = 'insurance-claim-'.$name.'-'.$this->random;
                    $saved = $insuranceClaim->save();
                    if($saved){
                        return response()->json(["message" => "success"]);
                    }
                }
            }else{
                $packageInsurance = PackageInsuranceCoverage::find($request->package_insurance_id);
                $insuranceClaim = new InsuranceClaim();
                $insuranceClaim->user_id = $request->user_id;
                $insuranceClaim->userpackage_id = $packageDetails->userpackage_id;
                $insuranceClaim->claiming_user_id = Auth::user()->id;
                $insuranceClaim->package_insurance_id = $request->package_insurance_id;
                $insuranceClaim->claim_amount = $packageInsurance->amount;
                if ($request->hand_written_letter) {
                    $image = $request->hand_written_letter;
                    if(env('STORAGE_TYPE') == 'minio'){
                        $destinationPath = 'images/';
                        $imageUpload = Helper::minio_upload($image, $destinationPath); 
                        $insuranceClaim->hand_written_letter_path = $imageUpload['path'];
                        $insuranceClaim->hand_written_letter = $imageUpload['file'];
                    }else{
                        $folderPath = "storage/images/"; //path location                
                        $imageUpload = Helper::native_upload($image,$folderPath);                    
                        $insuranceClaim->hand_written_letter_path = $imageUpload['path'];
                        $insuranceClaim->hand_written_letter = $imageUpload['file'];
                    }
                }
                if ($request->medical_report) {
                    $image = $request->medical_report;
                    if(env('STORAGE_TYPE') == 'minio'){
                        $destinationPath = 'images/';
                        $imageUpload = Helper::minio_upload($image, $destinationPath); 
                        $insuranceClaim->medical_report_path = $imageUpload['path'];
                        $insuranceClaim->medical_report = $imageUpload['file'];
                    }else{
                        $folderPath = "storage/images/"; //path location                
                        $imageUpload = Helper::native_upload($image,$folderPath);                    
                        $insuranceClaim->medical_report_path = $imageUpload['path'];
                        $insuranceClaim->medical_report = $imageUpload['file'];
                    }
                }
                if ($request->invoice) {
                    $image = $request->invoice;
                    if(env('STORAGE_TYPE') == 'minio'){
                        $destinationPath = 'images/';
                        $imageUpload = Helper::minio_upload($image, $destinationPath); 
                        $insuranceClaim->invoice_path = $imageUpload['path'];
                        $insuranceClaim->invoice = $imageUpload['file'];
                    }else{
                        $folderPath = "storage/images/"; //path location                
                        $imageUpload = Helper::native_upload($image,$folderPath);                    
                        $insuranceClaim->invoice_path = $imageUpload['path'];
                        $insuranceClaim->invoice = $imageUpload['file'];
                    }
                }
                $name = str_replace(' ', '-', $insuranceClaim->insurance->insurancetype->type);
                $insuranceClaim->slug = 'insurance-claim-'.$name.'-'.$this->random;
                $saved = $insuranceClaim->save();
                if($saved){
                    return response()->json(["message" => "success"]);
                }
            }
        }catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ],400);
        }        
    }

    public function deathStore(Request $request){
        try{
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'claiming_name' => 'required',
                'claiming_phone' => 'required',
                'relationship_certificate' => 'required',
                'death_certificate' => 'required',
                'insurance_type_id' => 'required',
            ]);
            $user = User::where('phone',$request->phone)->with('member')->first();
            if($user && $user->member != null){
                $type = $user->member->member_type;
                if($type == 'Primary Member'){
                    $familyname = FamilyName::where('primary_member_id',$user->member->id)->first();
                    $userpackage = UserPackage::where('familyname_id',$familyname->id)->where('package_status','Activated')->latest()->first();
                }elseif($type == 'Dependent Member'){
                    $family = Family::where('member_id',$user->member->id)->first();
                    $userpackage = UserPackage::where('familyname_id',$family->family_id)->where('package_status','Activated')->latest()->first();
                }else{
                    return response()->json(['message' => [
                        'error' => ['Activated Insurance Unavailable.']
                    ]],400);
                }
                if($userpackage){
                    $packageInsurance = PackageInsuranceCoverage::where('package_id', $userpackage->package_id)->where('insurance_type_id',$request->insurance_type_id)->first();
                    $claims = DeathClaim::where('package_insurance_id',$packageInsurance->id)->where('user_id',$user->id)->where('userpackage_id',$userpackage->id)->latest()->first();
                    if($claims){
                        if($claims->insurance_status != 'Claim Settelled' && $claims->insurance_status != 'Rejected'){
                            return response()->json(['message' => [
                                'error' => ['You already have an in-progress insurance claim settlement.']
                            ]],400);
                        }elseif($claims->insurance_status == 'Claim Settelled'){
                            return response()->json(['message' => [
                                'error' => ["This user's insurance has already been claimed."]
                            ]],400);
                        }else{
                            $insuranceClaim = new DeathClaim();
                            $insuranceClaim->user_id = $user->id;
                            $insuranceClaim->userpackage_id = $userpackage->id;
                            $insuranceClaim->package_insurance_id = $packageInsurance->id;
                            $insuranceClaim->name = $request->name;
                            $insuranceClaim->email = $request->email;
                            $insuranceClaim->phone = $request->phone;
                            $insuranceClaim->claiming_name = $request->claiming_name;
                            $insuranceClaim->claiming_email = $request->claiming_email;
                            $insuranceClaim->claiming_phone = $request->claiming_phone;
                            if ($request->relationship_certificate) {
                                $image = $request->relationship_certificate;
                                if(env('STORAGE_TYPE') == 'minio'){
                                    $destinationPath = 'images/';
                                    $imageUpload = Helper::minio_upload($image, $destinationPath); 
                                    $insuranceClaim->relationship_certificate_path = $imageUpload['path'];
                                    $insuranceClaim->relationship_certificate = $imageUpload['file'];
                                }else{
                                    $folderPath = "storage/images/"; //path location                
                                    $imageUpload = Helper::native_upload($image,$folderPath);                    
                                    $insuranceClaim->relationship_certificate_path = $imageUpload['path'];
                                    $insuranceClaim->relationship_certificate = $imageUpload['file'];
                                }
                            }
                            if ($request->death_certificate) {
                                $image = $request->death_certificate;
                                if(env('STORAGE_TYPE') == 'minio'){
                                    $destinationPath = 'images/';
                                    $imageUpload = Helper::minio_upload($image, $destinationPath); 
                                    $insuranceClaim->death_certificate_path = $imageUpload['path'];
                                    $insuranceClaim->death_certificate = $imageUpload['file'];
                                }else{
                                    $folderPath = "storage/images/"; //path location                
                                    $imageUpload = Helper::native_upload($image,$folderPath);                    
                                    $insuranceClaim->death_certificate_path = $imageUpload['path'];
                                    $insuranceClaim->death_certificate = $imageUpload['file'];
                                }
                            }
                            $saved = $insuranceClaim->save();
                            if($saved){
                                return response()->json(["message" => "success"]);
                            }
                        }
                    }else{
                        $insuranceClaim = new DeathClaim();
                        $insuranceClaim->user_id = $user->id;
                        $insuranceClaim->userpackage_id = $userpackage->id;
                        $insuranceClaim->package_insurance_id = $packageInsurance->id;
                        $insuranceClaim->name = $request->name;
                        $insuranceClaim->email = $request->email;
                        $insuranceClaim->phone = $request->phone;
                        $insuranceClaim->claiming_name = $request->claiming_name;
                        $insuranceClaim->claiming_email = $request->claiming_email;
                        $insuranceClaim->claiming_phone = $request->claiming_phone;
                        if ($request->relationship_certificate) {
                            $image = $request->relationship_certificate;
                            if(env('STORAGE_TYPE') == 'minio'){
                                $destinationPath = 'images/';
                                $imageUpload = Helper::minio_upload($image, $destinationPath); 
                                $insuranceClaim->relationship_certificate_path = $imageUpload['path'];
                                $insuranceClaim->relationship_certificate = $imageUpload['file'];
                            }else{
                                $folderPath = "storage/images/"; //path location                
                                $imageUpload = Helper::native_upload($image,$folderPath);                    
                                $insuranceClaim->relationship_certificate_path = $imageUpload['path'];
                                $insuranceClaim->relationship_certificate = $imageUpload['file'];
                            }
                        }
                        if ($request->death_certificate) {
                            $image = $request->death_certificate;
                            if(env('STORAGE_TYPE') == 'minio'){
                                $destinationPath = 'images/';
                                $imageUpload = Helper::minio_upload($image, $destinationPath); 
                                $insuranceClaim->death_certificate_path = $imageUpload['path'];
                                $insuranceClaim->death_certificate = $imageUpload['file'];
                            }else{
                                $folderPath = "storage/images/"; //path location                
                                $imageUpload = Helper::native_upload($image,$folderPath);                    
                                $insuranceClaim->death_certificate_path = $imageUpload['path'];
                                $insuranceClaim->death_certificate = $imageUpload['file'];
                            }
                        }
                        $saved = $insuranceClaim->save();
                        if($saved){
                            return response()->json(["message" => "success"]);
                        }
                    }
                }else{
                    return response()->json(['message' => [
                        'error' => ['Activated Insurance Unavailable.']
                    ]],400);
                }
            }else{
                return response()->json(['message' => [
                    'error' => ['User Unavailable.']
                ]],400);
            }
        }catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ],400);
        }       
    }
}
