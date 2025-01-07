<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageFee;
use App\Models\PackageScreening;
use App\Models\QuarterService;
use App\Models\Screening;
use App\Models\ScreeningDate;
use App\Models\Service;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PackageController extends Controller
{ 
    protected $random;

    public function __construct()
	{
		$this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("21"))) {
            $packages = Package::with('fees')->get();
            return view('admin.package.index',compact('packages'));
        }
        else {
            return view('viewnotfound');
        }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::any(checkPermission("21"))) {
            $package = Package::count();
            return view('admin.package.create',compact('package'));
        }
        else {
            return view('viewnotfound');
        }   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'package_type' => 'required',
            'description' => 'required',
            'registration_fee' => 'required',
            'monthly_fee' => 'required',
            'type' => 'required',
            'screening' => 'required',
            'checkup' => 'required',
            'ambulance' => 'required',
            'insurance' => 'required',
            'schedule_flexibility' => 'required',
            'online_consultation' => 'required',
            'tests' => 'required',
            'visits' => 'required',
            'seo_keyword' => 'required',
            'seo_description' => 'required',
            'slug' => 'required|unique:packages',
            'order' => 'required',
        ]);
        
        $package = new Package();
        $package->package_type = $request->package_type;
        $package->description = $request->description;
        $package->visits = $request->visits;
        $package->registration_fee = $request->registration_fee;
        $package->monthly_fee = $request->monthly_fee;
        // $name = str_replace(' ', '-', $request->package_type);
        // $package->slug =  'package-'.$name.'-'.$this->random;
        $package->order = $request->order;
        $package->type = $request->type;
        $package->screening = $request->screening;
        $package->checkup = $request->checkup;
        $package->ambulance = $request->ambulance;
        $package->insurance = $request->insurance;
        $package->tests = $request->tests;
        if($request->insurance == 1){
            $package->insurance_amount = $request->insurance_amount;
        }
        $package->schedule_flexibility = $request->schedule_flexibility;
        if($request->schedule_flexibility == 1){
            $package->schedule_times = $request->schedule_times;
        }
        $package->online_consultation = $request->online_consultation;
        $package->slug = $request->slug;
        $package->seo_keyword = $request->seo_keyword;
        $package->seo_description = $request->seo_description;
        $saved = $package->save();
        $screening = Screening::where('id','<=',$request->visits)->get();
        foreach($screening as $val ){
            $package_screening = new PackageScreening();
            $package_screening->package_id = $package->id;
            $package_screening->screening_id = $val->id;
            if($val->id == 1){
                $package_screening->category = 'Detail Screening';
            }else{
                $package_screening->category = 'Follow Up Screening';
            }
            $saved = $package_screening->save();
        }
        if($saved){
            return redirect()->route('package.index')->with('success','Package Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (Gate::any(checkPermission("21"))) {
            $package = Package::where('slug',$slug)->with(['fees','packagescreening.screening'])->first();
           // return $package;
            if($package->visits != null){
                $detail = PackageScreening::where('package_id',$package->id)->where('screening_id',1)->with(['tests.labtest.labprofile'])->first();
                $regular = PackageScreening::where('package_id',$package->id)->where('screening_id',2)->with(['tests.labtest.labprofile'])->first();
                //return $detail;
                return view('admin.package.show',compact('package','detail','regular'));
            }else{
                return view('admin.package.show',compact('package'));
            }
           
        }
        else {
            return view('viewnotfound');
        }   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
         if (Gate::any(checkPermission("21"))) {
            $package = Package::where('slug',$slug)->first();
            return view('admin.package.edit',compact('package'));
        }
        else {
            return view('viewnotfound');
        }   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $package = Package::where('slug',$slug)->first();

        $request->validate([
            'package_type' => 'required',
            'description' => 'required',
            'registration_fee' => 'required',
            'monthly_fee' => 'required',
            'type' => 'required',
            'screening' => 'required',
            'checkup' => 'required',
            'ambulance' => 'required',
            'insurance' => 'required',
            'schedule_flexibility' => 'required',
            'online_consultation' => 'required',
            'tests' => 'required',
            'slug' => 'required|unique:packages,slug,'.$package->id,
        ]);
        
        $package->package_type = $request->package_type;
        $package->description = $request->description;
        $package->visits = $request->visits;
        $package->registration_fee = $request->registration_fee;
        $package->monthly_fee = $request->monthly_fee;
        // $name = str_replace(' ', '-', $request->package_type);
        // $package->slug =  'package-'.$name.'-'.$this->random;
        $package->type = $request->type;
        $package->screening = $request->screening;
        $package->checkup = $request->checkup;
        $package->ambulance = $request->ambulance;
        $package->insurance = $request->insurance;
        $package->tests = $request->tests;
        if($request->insurance == 1){
            $package->insurance_amount = $request->insurance_amount;
        }else{
            $package->insurance_amount = null;
        }
        $package->schedule_flexibility = $request->schedule_flexibility;
        if($request->schedule_flexibility == 1){
            $package->schedule_times = $request->schedule_times;
        }else{
            $package->schedule_times = null;
        }
        $package->online_consultation = $request->online_consultation;
        $package->slug = $request->slug;
        $saved = $package->save();
        $package_screening  = PackageScreening::where('package_id',$package->id)->first();
        if($package_screening == null){
            $screening = Screening::where('id','<=',$request->visits)->get();
            foreach($screening as $val ){
                $package_screening = new PackageScreening();
                $package_screening->package_id = $package->id;
                $package_screening->screening_id = $val->id;
                if($val->id == 1){
                    $package_screening->category = 'Detail Screening';
                }else{
                    $package_screening->category = 'Follow Up Screening';
                }
                $saved = $package_screening->save();
            }
        }
        if($saved){
            return redirect()->route('package.index')->with('success','Package Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }

    public function consultationtype(Request $request,$id){
        $packagescreening  = PackageScreening::find($id);
        $packagescreening->consultation_type = $request->consultation_type;
        $packagescreening->update();
        return redirect()->back()->with('success','Consultation Type Updated Successfully.');
    }

    public function checkSlug(Request $request){
        if($request->id){
            $check = Package::where('slug',$request->slug)->where('id','!=',$request->id)->first();
            if($check){
                return response()->json(true);
            }else{
                return response()->json(false);
            }
        }else{
            $check = Package::where('slug',$request->slug)->first();
            if($check){
                return response()->json(true);
            }else{
                return response()->json(false);
            }
        }
    }

    public function updateSeo(Request $request, $slug){
        $request->validate([
            'seo_keyword' => 'required',
            'seo_description' => 'required'
        ]);
        $package = Package::where('slug',$slug)->first();
        $package->seo_keyword = $request->seo_keyword;
        $package->seo_description = $request->seo_description;
        $package->update();
        return redirect()->route('package.index')->with('success','Package SEO Updated Successfully.');
    }
}
