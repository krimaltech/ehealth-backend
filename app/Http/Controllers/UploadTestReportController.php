<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LabProfile;
use App\Models\LabTest;
use App\Models\MedicalReport;
use App\Models\Member;
use App\Models\PackageScreening;
use App\Models\PathologyReport;
use App\Models\ScreeningDate;
use App\Models\ScreeningTest;
use App\Models\SkipTest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UploadTestReportController extends Controller
{
    public function index(){
        if(Gate::allows('Lab Technician')){
            $employee = Employee::where('employee_id',Auth::user()->id)->first();
            // $dates = ScreeningDate::where('status','Sample Deposited')->get()->pluck('id');
            // $samplecollection = MedicalReport::whereIn('screeningdate_id',$dates)->with(['members:id,member_id','members.user','screeningdate.screening','screeningdate.userpackage.familyname','screeningdate.userpackage.package:id,package_type'])->where('status','Sample Deposited')->get();
            // $labcollection = MedicalReport::with(['members:id,member_id','members.user','screeningdate.screening','screeningdate.userpackage.familyname','screeningdate.userpackage.package:id,package_type'])->where('status','Draft Report')->where('lab_id',$employee->id)->get();
            $samplecollection = MedicalReport::with(['members:id,member_id','members.user','screeningdate.screening','screeningdate.userpackage.familyname','screeningdate.userpackage.package:id,package_type'])->where('status','Sample Deposited')->get();
            $labcollection = MedicalReport::with(['members:id,member_id','members.user','screeningdate.screening','screeningdate.userpackage.familyname','screeningdate.userpackage.package:id,package_type'])->where('status','Draft Report')->where('lab_id',$employee->id)->get();
            $sample = $labcollection->merge($samplecollection);
            return view('admin.uploadreport.index', compact('sample'));
        } else {
            return view('viewnotfound');
        }
    }

    public function fetchDetails($id){
        $sample = MedicalReport::with(['members:id,member_id,gender,dob','members.user','collectedby.user','screeningdate.screening','screeningdate.userpackage.familyname','screeningdate.userpackage.package:id,package_type','labreports'])->find($id);
        $labtests = $sample->labreports->pluck('test_id')->toArray();
        $skip = SkipTest::where('report_id',$id)->with(['profile','test'])->get();
        $skipProfiles = $skip->filter(function ($item) {
            return $item['labprofile_id'] !== null;
        })->pluck('labprofile_id');
        $skipTests = $skip->filter(function ($item) {
            return $item['labtest_id'] !== null;
        })->pluck('labtest_id')->toArray();
        $skipProfileTests = LabTest::whereIn('profile_id',$skipProfiles)->get()->pluck('id')->toArray();
        $tests = array_merge($skipTests,$skipProfileTests,$labtests);
        $user = Member::with('member')->find($sample->member_id);
        $age = Carbon::now()->format('Y') - substr($user->dob, 0, 4);
        $test = PackageScreening::where('package_id',$sample->screeningdate->userpackage->package_id)->where('screening_id',$sample->screeningdate->screening_id)->first();
        if ($age <= 16) {
            $profiles = ScreeningTest::where('package_screening_id', $test->id)->where('child',1)->whereNotIn('labtest_id',$tests)->with(['labtest.labvalue','labtest.labprofile'])->get()->groupBy('labtest.profile_id');
        }else{
            if ($user->gender == 'Male' || $user->gender == 'Others') {
                $profiles = ScreeningTest::where('package_screening_id', $test->id)->where('man',1)->whereNotIn('labtest_id',$tests)->with(['labtest.labvalue','labtest.labprofile'])->get()->groupBy('labtest.profile_id');
            }
            if ($user->gender == 'Female') {
                $profiles = ScreeningTest::where('package_screening_id', $test->id)->where('woman',1)->whereNotIn('labtest_id',$tests)->with(['labtest.labvalue','labtest.labprofile'])->get()->groupBy('labtest.profile_id');   
            }
        }

        //return $skipTests;

        $allprofiles = [];
        $alltests = [];
        foreach($profiles as $profile=>$values){
            if($profile != null){
                $pro = LabProfile::find($profile);
                $allprofiles[] = $pro;
            }else{
                foreach($values as $value){
                    $alltests[] = $value;
                }
            }
        }

        $completedtest = LabTest::whereIn('id',$labtests)->get()->groupBy('profile_id');
        $completedprofiles = [];
        $completedtests = [];
        foreach($completedtest as $profile=>$values){
            if($profile != null){
                $pro = LabProfile::find($profile);
                $completedprofiles[] = $pro;
            }else{
                foreach($values as $value){
                    $completedtests[] = $value;
                }
            }
        }

        return response()->json([
            'sample'=>$sample,
            'allprofiles'=>$allprofiles,
            'alltests'=>$alltests,
            'age'=>$age, 
            'packagescreening'=>$test->id,
            'completedprofiles'=>$completedprofiles,
            'completedtests'=>$completedtests,
            'skip'=>$skip,
            'tests'=>$tests,
        ]);
    }

    public function fetchprofiletest(Request $request,$packagescreening,$id)
    {
        if ($request->age <= 16) {
            $alltests = ScreeningTest::where('package_screening_id', $packagescreening)->where('child',1)->with(['labtest.labprofile','labtest.labvalue'])->whereHas('labtest.labprofile',function($query) use($id){
                $query->where('id',$id);
            })->get();
        }else{
            if ($request->gender == 'Male' || $request->gender == 'Others') {
                $alltests = ScreeningTest::where('package_screening_id', $packagescreening)->where('man',1)->with(['labtest.labprofile','labtest.labvalue'])->whereHas('labtest.labprofile',function($query) use($id){
                    $query->where('id',$id);
                })->get();
            }
            if ($request->gender == 'Female') {
                $alltests = ScreeningTest::where('package_screening_id', $packagescreening)->where('woman',1)->with(['labtest.labprofile','labtest.labvalue'])->whereHas('labtest.labprofile',function($query) use($id){
                    $query->where('id',$id);
                })->get();   
            }
        }
        return response()->json($alltests);
    }

    public function fetchtest($id)
    {
        $test = LabTest::with('labvalue')->find($id);
        return response()->json($test);
    }

    public function store(Request $request)
    {
        //return $request;
        if (Gate::allows('Lab Technician')) {
            if ($request->test_result_type == 'Range') {
                $report = new PathologyReport();
                $report->report_id = $request->report_id;
                $report->test_id = $request->test_id;
                $report->min_range = $request->min_range;
                $report->max_range = $request->max_range;
                $report->amber_min_range = $request->amber_min_range;
                $report->amber_max_range = $request->amber_max_range;
                $report->red_min_range = $request->red_min_range;
                $report->red_max_range = $request->red_max_range;
                $report->value = $request->value;
                $report->save();
            } else if ($request->test_result_type == 'Value') {
                foreach ($request->labvalue_id as $testId => $value) {
                    $report = new PathologyReport();
                    $report->report_id = $request->report_id;
                    $report->test_id = $request->test_id;
                    $report->labvalue_id = $value;
                    if(array_key_exists($testId,$request->result)){
                        $report->result = $request->result[$testId];
                    }
                    $report->save();
                }
            } else if ($request->test_result_type == 'Value and Image') {
                foreach ($request->labvalue_id as $testId => $value) {
                    $report = new PathologyReport();
                    $report->report_id = $request->report_id;
                    $report->test_id = $request->test_id;
                    $report->labvalue_id = $value;
                    if(array_key_exists($testId,$request->result)){
                        $report->result = $request->result[$testId];
                    }
                    $report->save();
                }
                if ($request->hasFile('report')) {
                    $report = new PathologyReport();
                    $report->report_id = $request->report_id;
                    $report->test_id = $request->test_id;
                    if (env('STORAGE_TYPE') == 'native') {
                        if ($request->hasFile('report')) {
                            $images = storeImageLaravel($request, 'report', 'report_path');
                            $report->report = $images[0];
                            $report->report_path = $images[1];
                        }
                    } else {
                        if ($request->hasFile('report')) {
                            $images = storeImageStorage($request, 'report', 'report_path');
                            $report->report = $images[0];
                            $report->report_path = $images[1];
                        }
                    }
                }
                $report->save();
            } else{
                if ($request->hasFile('report')) {
                    $report = new PathologyReport();
                    $report->report_id = $request->report_id;
                    $report->test_id = $request->test_id;
                    if (env('STORAGE_TYPE') == 'native') {
                        if ($request->hasFile('report')) {
                            $images = storeImageLaravel($request, 'report', 'report_path');
                            $report->report = $images[0];
                            $report->report_path = $images[1];
                        }
                    } else {
                        if ($request->hasFile('report')) {
                            $images = storeImageStorage($request, 'report', 'report_path');
                            $report->report = $images[0];
                            $report->report_path = $images[1];
                        }
                    }
                }
                $report->save();
            }

            //update status to draft report until all test report is generated
            $testreport = MedicalReport::find($request->report_id);
            $testreport->status = 'Draft Report';
            if($testreport->lab_id == null){
                $employee = Employee::where('employee_id',Auth::user()->id)->first();
                $testreport->lab_id = $employee->id;
            }
            $testreport->update();
            return response()->json(['success' => 'Test Report Added Successfully.']);
        } else {
            return view('viewnotfound');
        }
    }

    public function storeTests(Request $request){
        //return $request;
        if (Gate::allows('Lab Technician')) {
            foreach ($request->test_id as $key => $t) {
                if($request->test_result_type[$key] == 'Range'){
                    $report = new PathologyReport();
                    $report->report_id = $request->report_id;
                    $report->test_id = $t;
                    $report->min_range = $request->min_range[$key];
                    $report->max_range = $request->max_range[$key];
                    $report->amber_min_range = $request->amber_min_range[$key];
                    $report->amber_max_range = $request->amber_max_range[$key];
                    $report->red_min_range = $request->red_min_range[$key];
                    $report->red_max_range = $request->red_max_range[$key];
                    $report->value = $request->value[$key];
                    $saved = $report->save();
                }else if($request->test_result_type[$key] == 'Value'){
                    foreach($request->labvalue_id[$key] as $labkey => $labvalue){
                        $report = new PathologyReport();
                        $report->report_id = $request->report_id;
                        $report->test_id = $t;
                        $report->labvalue_id = $labvalue;
                        $report->result = $request->result[$key][$labkey];
                        $saved = $report->save();
                    }
                }
            }
            //update status to draft report until all test report is generated
            $testreport = MedicalReport::find($request->report_id);
            $testreport->status = 'Draft Report';
            if($testreport->lab_id == null){
                $employee = Employee::where('employee_id',Auth::user()->id)->first();
                $testreport->lab_id = $employee->id;
            }
            $testreport->update();
            if($saved){
                return response()->json(['success' => 'Test Report Added Successfully.']);
            }
        } else {
            return view('viewnotfound');
        }
    }

    public function edit($package,$id){
        $sample = MedicalReport::with(['members:id,member_id,gender,dob','members.user','collectedby.user','screeningdate.screening','screeningdate.userpackage.familyname','screeningdate.userpackage.package:id,package_type','labreports'])->find($id);
        $tests = $sample->labreports->pluck('test_id');
        $completedtest = LabTest::whereIn('id',$tests)->get()->groupBy('profile_id');
        $completedprofiles = [];
        $completedtests = [];
        foreach($completedtest as $profile=>$values){
            if($profile != null){
                $pro = LabProfile::find($profile);
                $completedprofiles[] = $pro;
            }else{
                foreach($values as $value){
                    $completedtests[] = $value;
                }
            }
        }
        return view('admin.uploadreport.edit',compact('package','sample','completedtests','completedprofiles'));
    }

    public function fetchprofiletestvalue(Request $request,$id){
        $tests = LabTest::where('profile_id',$id)->get()->pluck('id');
        $report = MedicalReport::with(['labreports.labtest','labreports'=>function($query) use($tests){
            $query->whereIn('test_id',$tests);
        }])->find($id);
        return response()->json($report);
    }

    public function skip(Request $request){
        $skip = new SkipTest();
        $skip->report_id = $request->reportId;
        if($request->type == 'Test'){
            $skip->labtest_id = $request->id;
        }
        if($request->type == 'Profile'){
            $skip->labprofile_id = $request->id;
        }
        $skip->skip_reason = $request->skip_reason;
        $saved = $skip->save();
        if($saved){
            return response()->json(['success' => 'Test Report Skipped Successfully.']);
        }
    }
}
