<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\AppointmentCompleted;
use App\Models\Employee;
use App\Models\Family;
use App\Models\FamilyName;
use App\Models\FamilyRequest;
use App\Models\Member;
use App\Models\PackageFee;
use App\Models\UpdatedMedicalHistory;
use App\Models\UploadMedicalHistory;
use App\Models\UploadMedicalHistoryConsultation;
use App\Models\User;
use App\Models\UserPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class UserProfileController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $member = Member::with('member.roles', 'member.referrer.subroles', 'school_profile')->where("member_id", $user_id)->first();
        if ($member->member_type == 'Primary Member') {
            $family = FamilyName::where('primary_member_id', $member->id)->first();
            $familyname = $family->family_name;
        } elseif ($member->member_type == 'Dependent Member') {
            $family = Family::where('member_id', $member->id)->with('familyname')->first();
            $familyname = $family->familyname->family_name;
        } else {
            $familyname = null;
        }
        $member->familyname = $familyname;
        return response()->json($member);
    }

    public function primary()
    {
        $user_id = Auth::user()->id;
        $member = Member::with('member')->where("member_id", $user_id)->first();
        $family = Family::where('family_id', $member->id)->with('user_2')->first();
        return response()->json($family);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'email|unique:users,email,' . Auth::user()->id,
                'phone' => 'unique:users,phone,' . Auth::user()->id,
                'dob' => 'required',
                'gender' => 'required',
            ]);
            $member = Member::with('member.roles')->findOrFail($id);
            // $familyName = FamilyName::where('family_name', $request->family_name)->with('family')->first();

            // if ($member->member_type == null) {
            //     if ($request->member_type == 'Primary Member') {
            //         //to check whether the family name already been taken by someone else
            //         if ($familyName != null) {
            //             return response()->json(["message" => "This family name is already taken."], 409     );
            //         }
            //     } else if ($request->member_type == 'Dependent Member') {
            //         if($familyName == null){
            //             return response()->json(["message" => "This family name does not exist."], 409     );
            //         }else{
            //             $package = UserPackage::where('familyname_id', $familyName->id)->latest()->first();
            //             //to check if family size exceeds package limits
            //             if($package != null){
            //                 $max = PackageFee::where('package_id', $package->package_id)->max('family_size');
            //                 if($familyName->family->count()+1 == $max){
            //                     return response()->json(["message" => "This family cannot accept any family members."], 409     );
            //                 }
            //             }
            //         }                    
            //     }
            // }
            $member->gender = $request->gender;
            $member->address = $request->address;
            $member->dob = $request->dob;
            $member->blood_group = $request->blood_group;
            $member->country = $request->country;
            $member->weight = $request->weight;
            $member->height = $request->height;
            $member->height_feet = $request->height_feet;
            $member->height_inch = $request->height_inch;
            if ($request->image) {
                $image = $request->image;
                if(env('STORAGE_TYPE') == 'minio'){
                    Storage::disk('minio')->delete('images/'.$member->image);
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($image, $destinationPath); 
                    $member->image_path = $imageUpload['path'];
                    $member->image = $imageUpload['file'];
                }else{
                    $deleteDestinationPath = 'public/images/' . $member->image;
                    if (Storage::exists($deleteDestinationPath)) {
                        Storage::delete($deleteDestinationPath);
                    }
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($image,$folderPath);                    
                    $member->image_path = $imageUpload['path'];
                    $member->image = $imageUpload['file'];
                }
            }
            if ($request->file) {
                $imagefile = $request->file;
                if(env('STORAGE_TYPE') == 'minio'){
                    Storage::disk('minio')->delete('images/'.$member->file);
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($imagefile, $destinationPath); 
                    $member->file_path = $imageUpload['path'];
                    $member->file = $imageUpload['file'];
                }else{
                    $deleteDestinationPath = 'public/images/' . $member->file;
                    if (Storage::exists($deleteDestinationPath)) {
                        Storage::delete($deleteDestinationPath);
                    }
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($imagefile,$folderPath);                    
                    $member->file_path = $imageUpload['path'];
                    $member->file = $imageUpload['file'];
                }
            }
            $name = str_replace(' ', '-', $request->name);
            $member->slug =  'member-' . $name . '-' . $this->random;
            // if ($member->member_type == null) {
            //     $member->member_type = $request->member_type;
            // }
            $member->save();
            // if ($member->member_type == 'Primary Member') {
            // $familyname = new FamilyName();
            // $familyname->primary_member_id = $member->id;
            // $familyname->family_name = $request->family_name.$member->id;
            // $familyname->save();
            // }
            // if ($request->member_type == 'Dependent Member') {
            // $family = new Family();
            // $family->family_id = $familyName->id;
            // $dependent_id = Member::where('member_id', Auth::user()->id)->first()->id;
            // $family->member_id = $dependent_id;
            // $family->save();
            // }
            $member_id = $member->member_id;
            $edit_member = User::findOrFail($member_id);
            $edit_member->name = $request->name;
            $edit_member->email = $request->email;
            $edit_member->phone = $request->phone;
            $saved = $edit_member->save();
            if ($saved) {
                return response()->json([
                    "status" => "true",
                    "profile" => $edit_member
                ], 200);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }
    }

    public function calculateCalorie(Request $request)
    {
        $gender = $request->gender;
        $age = $request->age;
        $weight = $request->weight;
        $height = $request->height * 100; //in cm
        $activity = $request->activity;

        if ($gender == 'Male') {
            $bmr = 10 * $weight + 6.25 * $height - 5 * $age + 5;
        }
        if ($gender == 'Female') {
            $bmr = 10 * $weight + 6.25 * $height - 5 * $age - 161;
        }

        if ($activity == 'Sedentary') {
            $calories = $bmr * 1.2;
        } elseif ($activity == 'Lightly active') {
            $calories = $bmr *  1.4;
        } elseif ($activity == 'Moderately active') {
            $calories = $bmr *  1.6;
        } elseif ($activity == 'Very active') {
            $calories = $bmr *  1.75;
        } elseif ($activity == 'Extra active') {
            $calories = $bmr *  2;
        } elseif ($activity == 'Professional athlete') {
            $calories = $bmr *  2.4;
        }
        return response()->json($calories);
    }

    public function updatebp(Request $request)
    {
        $member = Member::where('member_id', Auth::user()->id)->first();
        $member->bp = $request->upper . '/' . $request->lower;
        $member->bp_updated_date = Carbon::now()->format('Y-m-d');
        $updated = $member->update();
        $medical = new UpdatedMedicalHistory();
        $medical->member_id = $member->member_id;
        $medical->blood_pressure = $request->upper . '/' . $request->lower;
        $medical->save();

        if ($updated) {
            return response()->json(['message' => 'BP updated']);
        }
    }

    public function getheartrate(Request $request)
    {
        $heart_rate = $request->heart_rate;
        $blood_pressure = $request->blood_pressure;
        $steps_count = $request->steps_count;
        $chart = UpdatedMedicalHistory::where('member_id', Auth::user()->id)
            ->when($heart_rate, function ($query) use ($heart_rate) {
                return $query->whereNotNull('heart_rate')->select('id', $heart_rate, 'created_at', 'updated_at');
            })
            ->when($blood_pressure, function ($query) use ($blood_pressure) {
                return $query->whereNotNull('blood_pressure')->select('id', $blood_pressure, 'created_at', 'updated_at');
            })
            ->when($steps_count, function ($query) use ($steps_count) {
                return $query->whereNotNull('steps_count')->select('id', $steps_count, 'created_at', 'updated_at');
            })

            ->get();
        // $chart = UpdatedMedicalHistory::whereNotNull('blood_pressure')->select('id','blood_pressure','created_at','updated_at')->get();
        return response()->json($chart);
    }

    public function updateheartrate(Request $request)
    {
        $member = Member::where('member_id', Auth::user()->id)->first();
        $member->heart_rate = $request->heart_rate;
        $updated = $member->update();
        $medical = new UpdatedMedicalHistory();
        $medical->member_id = $member->member_id;
        $medical->heart_rate = $request->heart_rate;
        $medical->save();

        if ($updated) {
            return response()->json(['message' => 'Heart Rate Updated']);
        }
    }

    public function updatebmi(Request $request)
    {
        $member = Member::where('member_id', Auth::user()->id)->first();
        $member->weight = $request->weight;
        $member->height = $request->height;
        $updated = $member->update();
        $medical = new UpdatedMedicalHistory();
        $medical->member_id = $member->member_id;
        $medical->weight = $request->weight;
        $medical->height = $request->height;
        $medical->save();

        if ($updated) {
            return response()->json(['message' => 'BMI Updated']);
        }
    }

    public function uploadStore(Request $request)
    {
        $member = Member::where('member_id', Auth::user()->id)->first();
        $consultation = new UploadMedicalHistoryConsultation();
        $consultation->member_id = $member->id;
        if (Helper::check_userpackage($member->id) == 1) {
            $consultation->is_packaged = 1;
        } else {
            $consultation->is_packaged = 0;
        }
        
        $consultation->status = 0;
        $consultation->save();
        if ($request->report) {
            foreach ($request->report as $file) {
                $report = new UploadMedicalHistory();
                $report->member_id = $member->id;
                $report->upload_medical_history_consultation_id = $consultation->id;
                if(env('STORAGE_TYPE') == 'minio'){
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($file, $destinationPath); 
                    $report->report_path = $imageUpload['path'];
                    $report->report = $imageUpload['file'];
                }else{
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($file,$folderPath);                    
                    $report->report_path = $imageUpload['path'];
                    $report->report = $imageUpload['file'];
                }
                $report->save();
            }
            return response()->json([
                'success' => 'Medical Report Uploaded Successfully.'
            ]);
        }
    }

    public function medical_report(Request $request)
    {
        $examination = AppointmentCompleted::where('booking_id', $request->booking_id)->get();
        return response($examination);
    }

    public function medicalHistory(Request $request)
    {
        $member = Member::where('member_id', Auth::user()->id)->first();
        if ($request->id) {
            $consultation = UploadMedicalHistoryConsultation::orderBy('created_at','desc')->with('medical_report','doctor.user','department')->where('member_id', $member->id)->where('id',$request->id)->first();
        } else {
            $consultation = UploadMedicalHistoryConsultation::orderBy('created_at','desc')->with('medical_report','doctor.user','department')->where('member_id', $member->id)->get();
        }
        
        return response()->json($consultation);
    }

    public function gd_doctors()
    {
        $doctor = Employee::where('sub_role_id', 6)->with('user')->get();
        return response()->json($doctor);
    }

    public function becomePrimary(Request $request)
    {
        $member = Member::with('user')->find($request->id);
        $member->member_type = 'Primary Member';
        $member->update();

        $familyname = new FamilyName();
        $familyname->primary_member_id = $member->id;
        $split = explode(" ", $member->user->name);
        $name = $split[count($split) - 1];
        $familyname->family_name = $name . $member->id;
        $familyname->save();

        $primaryreceiverequests = FamilyRequest::where('received_id', $member->id)->get();
        $primarysendrequests = FamilyRequest::where('sent_id', $member->id)->get();
        foreach ($primaryreceiverequests as $item) {
            $item->delete();
        }
        foreach ($primarysendrequests as $item) {
            $item->delete();
        }
        return response()->json(['message' => 'You have become a primary member.']);
    }
}
