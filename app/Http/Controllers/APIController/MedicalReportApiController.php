<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Models\FamilyName;
use App\Models\LabTest;
use App\Models\MedicalReport;
use App\Models\Member;
use App\Models\PathologyReport;
use App\Models\ScreeningDate;
use App\Models\ScreeningReport;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalReportApiController extends Controller
{
    // public function labtests(Request $request){
    //     if($request->service_id){
    //         $user = Member::where('member_id',Auth::user()->id)->first();
    //         $userpackage = '';
    //         if($user->member_type == 'Primary Member'){
    //             $family = FamilyName::where('primary_member_id',$user->id)->first();
    //             $userpackage = UserPackage::where('familyname_id', $family->id)->with('package.screening')->latest()->first();
    //         } else if($user->member_type == 'Dependent Member'){
    //             $family = Family::where('member_id', $user->id)->where('approved', 1)->first();
    //             if($family != null){
    //                 $userpackage = UserPackage::where('familyname_id', $family->family_id)->with('package.screening')->latest()->first();
    //             }
    //         }            
    //         $report = MedicalReport::where('member_id',$user->id)->where('userpackage_id',$userpackage->id)->where('service_id',$request->service_id)->with(['screening','labreports.test'])->get();
    //         $service = Service::find($request->service_id);
    //         if($service->test_result_type == 'Range'){
    //             $data = MedicalReport::where('member_id',$user->id)->where('service_id',$request->service_id)->pluck('id');
    //             $chart_data =  PathologyReport::whereIn('report_id',$data)->with('reportdetails.screening')->get()->groupBy('test_id');
    //             //return $chart_data;
    //             $chart = [];
    //             $test = Test::all()->keyBy('id')->toArray();
    //             $testcount = 0;
    //             foreach($chart_data as $key=>$value){
    //                 $count = 0;
    //                 if(array_key_exists($key,$test)){
    //                     $testname = $test[$key]['tests'];
    //                 }
    //                 $chart[$testcount]['id'] = $key;
    //                 $chart[$testcount]['test'] = $testname;
    //                 foreach($value as $cd){
    //                     $chart[$testcount]['report'][$count]['screening'] = $cd->reportdetails->screening->screening;
    //                     $chart[$testcount]['report'][$count]['date'] = $cd->created_at->format('Y-m-d');
    //                     $chart[$testcount]['report'][$count]['min_range'] = $cd->min_range;
    //                     $chart[$testcount]['report'][$count]['max_range'] = $cd->max_range;
    //                     $chart[$testcount]['report'][$count]['amber_min_range'] = $cd->amber_min_range;
    //                     $chart[$testcount]['report'][$count]['amber_max_range'] = $cd->amber_max_range;
    //                     $chart[$testcount]['report'][$count]['red_min_range'] = $cd->red_min_range;
    //                     $chart[$testcount]['report'][$count]['red_max_range'] = $cd->red_max_range;
    //                     $chart[$testcount]['report'][$count]['value'] = $cd->value;
    //                     $count++;
    //                 }
    //                 $testcount++;
    //             }
    //             return response()->json(['service'=>$service,'report'=>$report,'chart' => $chart]);
    //         }else if($service->test_result_type == 'Value' || $service->test_result_type == 'Image' || $service->test_result_type == 'Value and Image'){
    //             return response()->json(['service'=>$service,'report'=>$report]);
    //         }
    //     }else{
    //         $user = Member::where('member_id',Auth::user()->id)->first();
    //         $userpackage = '';
    //         $reports = [];
    //         if($user->member_type == 'Primary Member'){
    //             $family = FamilyName::where('primary_member_id',$user->id)->first();
    //             $userpackage = UserPackage::where('familyname_id', $family->id)->with(['package:id,package_type','dates'])->whereHas('dates',function($query){
    //                 $query->where('status','Doctor Visit')->latest();
    //             })->latest()->first();
    //         } else if($user->member_type == 'Dependent Member'){
    //             $family = Family::where('member_id', $user->id)->where('approved', 1)->first();
    //             if($family != null){
    //                 $userpackage = UserPackage::where('familyname_id', $family->family_id)->with('package.screening')->latest()->first();
    //             }
    //         }  
    //         if($userpackage != null){
    //             $reports = MedicalReport::where('member_id',$user->id)->where('screeningdate_id',$userpackage->dates[0]->id)->with(['labreports.labtest.labdepartment','labreports.labtest.labprofile'])->get();

    //             return response()->json($reports);      
    //         }else{
    //             return response()->json($reports);      
    //         }  
    //     }        
    //     // if($request->service_id){
    //     //     $user = Member::where('member_id',Auth::user()->id)->first();
    //     //     $userpackage = '';
    //     //     if($user->member_type == 'Primary Member'){
    //     //         $family = FamilyName::where('primary_member_id',$user->id)->first();
    //     //         $userpackage = UserPackage::where('familyname_id', $family->id)->with('package.screening')->latest()->first();
    //     //     } else if($user->member_type == 'Dependent Member'){
    //     //         $family = Family::where('member_id', $user->id)->where('approved', 1)->first();
    //     //         if($family != null){
    //     //             $userpackage = UserPackage::where('familyname_id', $family->family_id)->with('package.screening')->latest()->first();
    //     //         }
    //     //     }            
    //     //     $report = MedicalReport::where('member_id',$user->id)->where('userpackage_id',$userpackage->id)->where('service_id',$request->service_id)->with(['screening','labreports.test'])->get();
    //     //     $service = Service::find($request->service_id);
    //     //     if($service->test_result_type == 'Range'){
    //     //         $data = MedicalReport::where('member_id',$user->id)->where('service_id',$request->service_id)->pluck('id');
    //     //         $chart_data =  PathologyReport::whereIn('report_id',$data)->with('reportdetails.screening')->get()->groupBy('test_id');
    //     //         //return $chart_data;
    //     //         $chart = [];
    //     //         $test = Test::all()->keyBy('id')->toArray();
    //     //         $testcount = 0;
    //     //         foreach($chart_data as $key=>$value){
    //     //             $count = 0;
    //     //             if(array_key_exists($key,$test)){
    //     //                 $testname = $test[$key]['tests'];
    //     //             }
    //     //             $chart[$testcount]['id'] = $key;
    //     //             $chart[$testcount]['test'] = $testname;
    //     //             foreach($value as $cd){
    //     //                 $chart[$testcount]['report'][$count]['screening'] = $cd->reportdetails->screening->screening;
    //     //                 $chart[$testcount]['report'][$count]['date'] = $cd->created_at->format('Y-m-d');
    //     //                 $chart[$testcount]['report'][$count]['min_range'] = $cd->min_range;
    //     //                 $chart[$testcount]['report'][$count]['max_range'] = $cd->max_range;
    //     //                 $chart[$testcount]['report'][$count]['amber_min_range'] = $cd->amber_min_range;
    //     //                 $chart[$testcount]['report'][$count]['amber_max_range'] = $cd->amber_max_range;
    //     //                 $chart[$testcount]['report'][$count]['red_min_range'] = $cd->red_min_range;
    //     //                 $chart[$testcount]['report'][$count]['red_max_range'] = $cd->red_max_range;
    //     //                 $chart[$testcount]['report'][$count]['value'] = $cd->value;
    //     //                 $count++;
    //     //             }
    //     //             $testcount++;
    //     //         }
    //     //         return response()->json(['service'=>$service,'report'=>$report,'chart' => $chart]);
    //     //     }else if($service->test_result_type == 'Value' || $service->test_result_type == 'Image' || $service->test_result_type == 'Value and Image'){
    //     //         return response()->json(['service'=>$service,'report'=>$report]);
    //     //     }
    //     // }else{
    //     //     $user = Member::where('member_id',Auth::user()->id)->first();
    //     //     $userpackage = '';
    //     //     $services =  [];
    //     //     if($user->member_type == 'Primary Member'){
    //     //         $family = FamilyName::where('primary_member_id',$user->id)->first();
    //     //         $userpackage = UserPackage::where('familyname_id', $family->id)->with('package.screening')->latest()->first();
    //     //     } else if($user->member_type == 'Dependent Member'){
    //     //         $family = Family::where('member_id', $user->id)->where('approved', 1)->first();
    //     //         if($family != null){
    //     //             $userpackage = UserPackage::where('familyname_id', $family->family_id)->with('package.screening')->latest()->first();
    //     //         }
    //     //     }  
    //     //     if($userpackage != null){
    //     //         $tests = MedicalReport::where('member_id',$user->id)->where('userpackage_id',$userpackage->id)->get()->groupBy('service_id');
    //     //         foreach($tests as $key => $value){
    //     //             $services[] = Service::where('id',$key)->first();
    //     //         }
    //     //         return response()->json($services);      
    //     //     }else{
    //     //         return response()->json($services);      
    //     //     }  
    //     // }        
    // }   

    // public function screeningReport($userpackageId, $screeningId){
    //     $member = Member::where('member_id',Auth::user()->id)->first();
    //     $date = ScreeningDate::where('userpackage_id',$userpackageId)->where('screening_id',$screeningId)->first();
    //     $report = MedicalReport::where('userpackage_id',$userpackageId)->where('screening_id',$screeningId)->where('member_id',$member->id)->with(['service','labreports.test'])->get();
    //     return response()->json($report);
    // }

    // public function services(){
    //     $services = Service::where('test_result_type','Range')->with('tests')->get();
    //     return response()->json($services);
    // }

    // public function viewChart($serviceId,$testId){
    //     $user = Member::where('member_id',Auth::user()->id)->first();
    //     $data = MedicalReport::where('member_id',$user->id)->where('service_id',$serviceId)->pluck('id');
    //     $chart_data = PathologyReport::whereIn('report_id',$data)->where('test_id',$testId)->with('reportdetails.screening')->get();
    //     //return $chart_data;
    //     $chart = [];
    //     $test = Test::find($testId);
    //     $count = 0;
    //     $chart['id'] = $testId;
    //     $chart['test'] = $test->tests;
    //     foreach($chart_data as $value){
    //         $chart['report'][$count]['screening'] = $value->reportdetails->screening->screening;
    //         $chart['report'][$count]['date'] = $value->created_at->format('Y-m-d');
    //         $chart['report'][$count]['min_range'] = $value->min_range;
    //         $chart['report'][$count]['max_range'] = $value->max_range;
    //         $chart['report'][$count]['amber_min_range'] = $value->amber_min_range;
    //         $chart['report'][$count]['amber_max_range'] = $value->amber_max_range;
    //         $chart['report'][$count]['red_min_range'] = $value->red_min_range;
    //         $chart['report'][$count]['red_max_range'] = $value->red_max_range;
    //         $chart['report'][$count]['value'] = $value->value;
    //         $count++;
    //     }
    //     return response()->json($chart);
    // }

    public function index(){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $userpackage = '';
        if($member->member_type == 'Primary Member'){
            $family = FamilyName::where('primary_member_id',$member->id)->first();
            $userpackage = UserPackage::where('familyname_id', $family->id)->latest()->first();
        } else if($member->member_type == 'Dependent Member'){
            $family = Family::where('member_id', $member->id)->where('approved', 1)->where('payment_status',1)->first();
            if($family != null){
                $userpackage = UserPackage::where('familyname_id', $family->family_id)->latest()->first();
            }
        }  
        $reports = [];
        if($userpackage != null){
            $dates = ScreeningDate::where('userpackage_id',$userpackage->id)->get()->pluck('id');
            $reports = MedicalReport::where('member_id',$member->id)->whereIn('screeningdate_id',$dates)->with(['screeningdate.screening','collectedby.user','lab.user','verifiedby.user','advice.team.employee.user','pdf','labreports','labreports.labtest'=>function($query){
                $query->where('test_result_type','Range');
            }])->get();
            if(count($reports) == 0){
                return response()->json(['message'=>'No reports generated yet.', 'reports'=>$reports]);
            }else{
                return response()->json(['message'=>'success', 'reports'=>$reports]);
            }
        }else{
            return response()->json(['message'=>'You have not bought any package.', 'reports'=>$reports]);
        }
        // $report = $reports->pluck('id');
        // $tests = PathologyReport::whereIn('report_id',$report)->with(['labtest','reportdetails.screeningdate.screening'])->whereHas('labtest',function($query){
        //     $query->where('test_result_type','Range');
        // })->get()->groupBy('test_id');
        // $chart = [];
        // $testcount =  0;
        // foreach($tests as $test=>$value){
        //     $count = 0;
        //     $tst = LabTest::find($test);
        //     $chart[$testcount]['id'] = $tst->id;
        //     $chart[$testcount]['tests'] = $tst->tests;
        //     $chart[$testcount]['unit'] = $tst->unit;
        //     foreach($value as $cd){
        //         $chart[$testcount]['report'][$count]['screening'] = $cd->reportdetails->screeningdate->screening;
        //         $chart[$testcount]['report'][$count]['month'] = Carbon::parse($cd->labreport_date)->format('M');
        //         $chart[$testcount]['report'][$count]['min_range'] = $cd->min_range;
        //         $chart[$testcount]['report'][$count]['max_range'] = $cd->max_range;
        //         $chart[$testcount]['report'][$count]['value'] = $cd->value;
        //         $count++;
        //     }
        //     $testcount++;
        // }
    }

    public function reportpdf(Request $request){
        if($request->id){
            $report = ScreeningReport::with(['reportdetail.screeningdate.screening','reportdetail.screeningdate.userpackage:id,package_id','reportdetail.screeningdate.userpackage.package:id,package_type'])->find($request->id);
            return response()->json($report);
        }else{
            $user = Member::where('member_id',Auth::user()->id)->first();
            $reports = ScreeningReport::with(['reportdetail.screeningdate.screening','reportdetail.screeningdate.userpackage:id,package_id','reportdetail.screeningdate.userpackage.package:id,package_type'])->whereHas('reportdetail', function($query) use($user){
                $query->where('member_id',$user->id);
            })->latest()->get();
            return response()->json($reports);
        }
    }

    public function chart(){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $id = $member->id;        
        $reportIds = ScreeningReport::with('reportdetail')->whereHas('reportdetail',function($query) use($id){
            $query->where('member_id',$id);
        })->get()->pluck('report_id');
        if($reportIds->isNotEmpty()){
            $reports = PathologyReport::whereIn('report_id',$reportIds)->whereHas('labtest',function($query){
                $query->where('test_result_type','Range');
            })->get()->groupBy('test_id');
            if($reports){
                $result = $reports->keys();
                $tests = LabTest::whereIn('id',$result)->get();
                foreach($tests as $test){
                    $arrayReports = json_decode($reports, true);
                    if(array_key_exists($test->id,$arrayReports)){
                        $test['chart'] = $reports[$test->id];
                    }
                }
                return response()->json($tests);
            }else{
                return response()->json(['message' => [
                    'error' => ['Chart Report Unavailable.']
                ]],400);
            }
        }else{
            return response()->json(['message' => [
                'error' => ['Chart Report Unavailable.']
            ]],400);
        }
    }
}
