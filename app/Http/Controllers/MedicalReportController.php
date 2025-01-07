<?php

namespace App\Http\Controllers;

use App\Models\BookingNotification;
use App\Models\BookService;
use App\Models\DoctorScreeningAdvice;
use App\Models\Employee;
use App\Models\Family;
use App\Models\FamilyName;
use App\Models\LabDepartment;
use App\Models\LabProfile;
use App\Models\LabTest;
use App\Models\MedicalReport;
use App\Models\Member;
use App\Models\PackageScreening;
use App\Models\PackageScreeningTeam;
use App\Models\PathologyReport;
use App\Models\RejectReport;
use App\Models\SampleNotCollected;
use App\Models\Screening;
use App\Models\ScreeningDate;
use App\Models\ScreeningReport;
use App\Models\ScreeningTest;
use App\Models\Service;
use App\Models\StoreToken;
use App\Models\Test;
use App\Models\UserPackage;
use Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class MedicalReportController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789"), 0, 3);
    }

    public function index()
    {
        if(Gate::any(['SuperAdmin','Admin','Lab Dept Head'])){
            $packages = UserPackage::where('package_status','Activated')->with(['package','familyname.primary.user','dates.employees','dates.reports'])->whereHas('dates.reports')->get();
            return view('admin.medicalreport.index', compact('packages'));
        }
        else if(Gate::allows('Lab Technician')){
            $employee = Employee::where('employee_id',Auth::user()->id)->first();
            $id = $employee->id;
            $dates = ScreeningDate::with('employees')->whereHas('employees',function($query) use($id){
                $query->where('employee_id',$id)->where('type','Lab Technician');
            })->get()->pluck('userpackage_id');
            $packages = UserPackage::whereIn('id',$dates)->where('package_status','Activated')->with(['package','familyname.primary.user','dates.employees','dates.reports'])->get();
            return view('admin.medicalreport.index', compact('packages'));
        }else if(Gate::allows('GD Nurse')){
            $employee = Employee::where('employee_id',Auth::user()->id)->first();
            $id = $employee->id;
            $dates = ScreeningDate::with('employees')->whereHas('employees',function($query) use($id){
                $query->where('employee_id',$id)->where('type','Lab Nurse');
            })->get()->pluck('userpackage_id');
            $packages = UserPackage::whereIn('id',$dates)->where('package_status','Activated')->with(['package','familyname.primary.user','dates.employees','dates.reports'])->get();
            return view('admin.medicalreport.index', compact('packages'));
        } else {
            return view('viewnotfound');
        }
        // if(Gate::any(['SuperAdmin','Admin','Lab Dept Head'])){
        //     $sample = MedicalReport::with(['members:id,member_id','members.user','screeningdate.screening','screeningdate.userpackage.familyname','screeningdate.userpackage.package:id,package_type'])->get();
        //     return view('admin.medicalreport.index', compact('sample'));
        // }
        // else if(Gate::allows('Lab Technician')){
        //     $employee = Employee::where('employee_id',Auth::user()->id)->first();
        //     $id = $employee->id;
        //     $dates = ScreeningDate::with('employees')->whereHas('employees',function($query) use($id){
        //         $query->where('employee_id',$id)->where('type','Lab Technician');
        //     })->where('status','Lab Visit Pending')->get()->pluck('id');
        //     $sample1 = MedicalReport::with(['members:id,member_id','members.user','screeningdate.screening','screeningdate.userpackage.familyname','screeningdate.userpackage.package:id,package_type'])->whereIn('screeningdate_id',$dates)->get();
        //     $sample2 = MedicalReport::with(['members:id,member_id','members.user','screeningdate.screening','screeningdate.userpackage.familyname','screeningdate.userpackage.package:id,package_type'])->where('status','!=','Sample to be collected')->where('lab_id',$employee->id)->orWhere('collected_by',$employee->id)->get();
        //     $sample = $sample2->merge($sample1);
        //     return view('admin.medicalreport.index', compact('sample'));
        // }else if(Gate::allows('GD Nurse')){
        //     $employee = Employee::where('employee_id',Auth::user()->id)->first();
        //     $id = $employee->id;
        //     $dates = ScreeningDate::with('employees')->whereHas('employees',function($query) use($id){
        //         $query->where('employee_id',$id)->where('type','Lab Nurse');
        //     })->where('status','Lab Visit Pending')->get()->pluck('id');
        //     $sample1 = MedicalReport::with(['members:id,member_id','members.user','screeningdate.screening','screeningdate.userpackage.familyname','screeningdate.userpackage.package:id,package_type'])->whereIn('screeningdate_id',$dates)->get();
        //     $sample2 = MedicalReport::with(['members:id,member_id','members.user','screeningdate.screening','screeningdate.userpackage.familyname','screeningdate.userpackage.package:id,package_type'])->where('status','!=','Sample to be collected')->where('lab_id',$employee->id)->orWhere('collected_by',$employee->id)->get();
        //     $sample = $sample2->merge($sample1);
        //     return view('admin.medicalreport.index', compact('sample'));
        // } else {
        //     return view('viewnotfound');
        // }

    }

    public function sampleStore(Request $request){
        $employee = Employee::where('employee_id',Auth::user()->id)->first();
        $sample = MedicalReport::find($request->report);
        $sample->sample_date = Carbon::now()->format('Y-m-d H:i:s');
        $sample->status = 'Sample Collected';
        $sample->collected_by = $employee->id;
        $sample->sample_info = $request->sample_info;
        $saved = $sample->update();

        //if sample collection details of each member of family is added, then change screening status to Sample Collected
        // $report = MedicalReport::where('screeningdate_id',$sample->screeningdate_id)->count();
        // $collectedcount = MedicalReport::where('screeningdate_id',$sample->screeningdate_id)->where('status','Sample Collected')->count();
        // $screening = ScreeningDate::with(['userpackage:id,familyname_id','userpackage.familyname.family'])->find($sample->screeningdate_id);
        // $count =  $screening->userpackage->familyname->family->count() + 1;
        // if($report == $collectedcount){
        //     $screening = ScreeningDate::find($sample->screeningdate_id);
        //     $screening->status = 'Sample Collected';
        //     $screening->update();
        // }

        if($saved){
            return redirect()->back()->with('success','Sample Collection Details Added.');
        }

    }

    public function deposited(Request $request){
        if (Gate::any(['SuperAdmin', 'Admin'])) {
            $sample = MedicalReport::find($request->report);
            $sample->status = 'Sample Deposited';
            $sample->deposited_date = Carbon::now();
            $saved = $sample->update();

            // $report = MedicalReport::where('screeningdate_id',$sample->screeningdate_id)->count();
            // $depositedcount = MedicalReport::where('screeningdate_id',$sample->screeningdate_id)->where('status','Sample Deposited')->count();
            // if($report == $depositedcount){
            //     $screening = ScreeningDate::find($sample->screeningdate_id);
            //     $screening->status = 'Sample Deposited';
            //     $screening->update();
            // }
    
            if($saved){
                return redirect()->back()->with('success','Sample Deposited.');
            }
        } else {
            return view('viewnotfound');
        }
    }

    public function verifyReport(Request $request){
        if (Gate::allows('Lab Dept Head')) {
            $employee = Employee::where('employee_id',Auth::user()->id)->first();
            $report = MedicalReport::with(['lab.user','verifiedby.user'])->find($request->report);
            $report->status = 'Report Verified';
            $report->verified_by = $employee->id;
            $report->report_date = Carbon::now();
            $report->update();

            $totalreport = MedicalReport::where('screeningdate_id',$report->screeningdate_id)->count();
            $verifiedReport = MedicalReport::where('screeningdate_id',$report->screeningdate_id)->whereIn('status',['Report Verified','Skipped'])->count();
            if($totalreport == $verifiedReport){ 
                $screening = ScreeningDate::find($report->screeningdate_id);
                $screening->status = 'Report Generated';
                $screening->labreport_date = Carbon::now();
                $screening->update();
            }

            $newreport = MedicalReport::with(['lab.user','verifiedby.user','skip'=> function($query){
                $query->where('upload_status',0);
            },'skip.profile','skip.test'])->find($request->report);
            $member = Member::with('user')->find($newreport->member_id);
            $name = str_replace(' ','_',$member->user->name);
            $screenings = Screening::find($newreport->screeningdate->screening_id);
            $screening = str_replace(' ','_',$screenings->screening);
            $member = Member::with('user')->find($newreport->member_id);
            $name = str_replace(' ','_',$member->user->name);
            $screenings = Screening::find($newreport->screeningdate->screening_id);
            $screening = str_replace(' ','_',$screenings->screening);
            $labprofile = LabProfile::all();
            $labdepartment = LabDepartment::all();
            $labtest = LabTest::all();
            $range = PathologyReport::where('report_id',$newreport->id)->with(['labtest.labprofile','labtest.labdepartment'])->whereHas('labtest',function($query){
                $query->where('test_result_type','Range');
            })->get()->groupBy(['labtest.department_id','labtest.profile_id']);
            $value = PathologyReport::where('report_id',$newreport->id)->with(['labtest.labprofile','labtest.labdepartment','labvalue'])->whereHas('labtest',function($query){
                $query->where('test_result_type','Value');
            })->get()->groupBy(['labtest.department_id','labtest.profile_id','test_id']);
            $valueImage = PathologyReport::where('report_id',$newreport->id)->with(['labtest.labprofile','labtest.labdepartment','labvalue'])->whereHas('labtest',function($query){
                $query->where('test_result_type','Value and Image');
            })->get()->groupBy(['labtest.department_id','labtest.profile_id','test_id']);
            $image = PathologyReport::where('report_id',$newreport->id)->with(['labtest.labprofile','labtest.labdepartment'])->whereHas('labtest',function($query){
                $query->where('test_result_type','Image');
            })->get()->groupBy(['labtest.department_id','labtest.profile_id']);
            $pdf = Pdf::loadView('admin.medicalreport.pdf.pdfView', compact('newreport','member','screenings','range','value','valueImage','image','labprofile','labdepartment','labtest'));
            Storage::put('public/pdf/Pathology_Report_'.$name.'_'.$screening.'_'.$newreport->screeningdate->userpackage_id.'.pdf', $pdf->output());
            $reportpdf = new ScreeningReport();
            $reportpdf->report_id = $newreport->id;
            $reportpdf->report = 'Pathology_Report_'.$name.'_'.$screening.'_'.$newreport->screeningdate->userpackage_id.'.pdf'; 
            $reportpdf->report_path = asset('storage/pdf/Pathology_Report_'.$name.'_'.$screening.'_'.$newreport->screeningdate->userpackage_id.'.pdf'); 
            $saved = $reportpdf->save();
            if($saved){
                return redirect()->back()->with('success','Report Verified Successfully and PDF Generated.');
            }
        } else {
            return view('viewnotfound');
        }
    }
    
    public function publishReport(Request $request){
        if (Gate::allows('Lab Technician')) {
            $report = MedicalReport::find($request->report_id);
            $report->status = 'Report Published';
            $report->report_date = Carbon::now();
            $report->update();

            // $totalreport = MedicalReport::where('screeningdate_id',$report->screeningdate_id)->count();
            // $reportCount = MedicalReport::where('screeningdate_id',$report->screeningdate_id)->where('status','Report Published')->count();
            // if($totalreport == $reportCount){
            //     $screening = ScreeningDate::find($report->screeningdate_id);
            //     $screening->status = 'Report Published (Not Verified)';
            //     $screening->update();
            // }

            return redirect()->back()->with('success','Report Published Successfully.');
        } else {
            return view('viewnotfound');
        }
    }

    public function show($package,$id)
    {
        if (Gate::any(['SuperAdmin', 'Admin', 'Lab Technician','Lab Dept Head','GD Nurse'])) {
            $labprofile = LabProfile::all();
            $labdepartment = LabDepartment::all();
            $labtest = LabTest::all();
            $report = MedicalReport::with(['members:id,member_id,dob,gender','members.user','collectedby.user','lab.user','screeningdate.screening','screeningdate.userpackage.familyname','screeningdate.userpackage.package:id,package_type','advice.team.employee.user','pdf','skip'=>function($query){
                $query->where('upload_status','0');
            },'skip.profile','skip.test'])->find($id);
            $charttests = PathologyReport::where('report_id',$id)->with(['labtest.labprofile','labtest.labdepartment'])->whereHas('labtest',function($query){
                $query->where('test_result_type','Range');
            })->get();
            $range = PathologyReport::where('report_id',$id)->with(['labtest.labprofile','labtest.labdepartment'])->whereHas('labtest',function($query){
                $query->where('test_result_type','Range');
            })->get()->groupBy(['labtest.department_id','labtest.profile_id']);
            $value = PathologyReport::where('report_id',$id)->with(['labtest.labprofile','labtest.labdepartment','labvalue'])->whereHas('labtest',function($query){
                $query->where('test_result_type','Value');
            })->get()->groupBy(['labtest.department_id','labtest.profile_id','test_id']);
            $valueImage = PathologyReport::where('report_id',$id)->with(['labtest.labprofile','labtest.labdepartment','labvalue'])->whereHas('labtest',function($query){
                $query->where('test_result_type','Value and Image');
            })->get()->groupBy(['labtest.department_id','labtest.profile_id','test_id']);
            $image = PathologyReport::where('report_id',$id)->with(['labtest.labprofile','labtest.labdepartment'])->whereHas('labtest',function($query){
                $query->where('test_result_type','Image');
            })->get()->groupBy(['labtest.department_id','labtest.profile_id']);
            return view('admin.medicalreport.show', compact('package','report','range','value','valueImage','image','charttests','labprofile','labdepartment','labtest'));
        } else {
            return view('viewnotfound');
        }
    }

    public function view($id)
    {
        if (Gate::any(['SuperAdmin', 'Admin','Lab Dept Head','Lab Technician','GD Nurse'])) {
            $package = UserPackage::with(['familyname.primary.member', 'familyname.family', 'package', 'dates.screening', 'dates.online.member.user','dates.reports.members.user','dates.reports.nosample','dates.reports.additionalnosample','dates.employees.employee.user', 'payment' => function ($query) {
                $query->latest();
            },'dates'=>function($q){
                $q->latest();
            }])->find($id);
            $employee = Employee::where('employee_id',Auth::user()->id)->first();
            //return $package;
            return view('admin.medicalreport.view', compact('package','id','employee'));
        } else {
            return view('viewnotfound');
        }
    }

    public function chart($screeningdate,$test,$member){
        if (Gate::any(['SuperAdmin', 'Admin', 'Lab Technician','GD Doctor','Lab Dept Head'])) {
            $screening = MedicalReport::where('member_id',$member)->where('screeningdate_id',$screeningdate)->first();
            $report = PathologyReport::where('report_id',$screening->id)->where('test_id',$test)->with('labtest')->first();
            $chart = [];
            array_push($chart, [$report->created_at->format('M'), $report->min_range, $report->max_range, $report->value]);
            return response()->json(['chart' => $chart, 'name' => $report->labtest->tests]);
        } else {
            return view('viewnotfound');
        }
    }

    public function searchReport()
    {
        $member = Member::with('user')->whereHas('user', function ($query) {
            $query->where('is_verified', 1);
        })->get();
        return view('admin.medicalreport.search', compact('member'));
    }

    public function search(Request $request)
    {
        $id = $request->member;
        $user = Member::with('member')->find($id);
        $report = ScreeningReport::with('reportdetail')->whereHas('reportdetail',function($query) use($id){
            $query->where('member_id',$id);
        })->latest()->get();
        $reportIds = $report->pluck('report_id');
        $tests = PathologyReport::whereIn('report_id',$reportIds)->with('labtest')->whereHas('labtest',function($query){
            $query->where('test_result_type','Range');
        })->get()->pluck('test_id')->toArray();
        $result = array_unique($tests);
        $tests = LabTest::whereIn('id',$result)->get();
        //return $report;
        // $services = Service::all();
        // $single_report = BookService::where('member_id',$id)->where('booking_status','Completed')->with('labreports.test')->get()->groupBy('service_id');
        return view('admin.medicalreport.report', compact('report', 'id', 'user','tests'));
    }

    //for doctor team
    public function reportIndex()
    {
        if (Gate::any(['SuperAdmin', 'Admin', 'GD Doctor','GD Nurse','Fitness Trainer','Dietician'])) {
            $employee = Employee::where('employee_id',Auth::user()->id)->first();
            $id = $employee->id;
            $dates = ScreeningDate::whereIn('status',['Doctor Visit','Doctor Visit Completed'])->with('employees')->whereHas('employees',function($query) use($id){
                $query->where('employee_id',$id)->where('type','!=','Lab Technician')->where('type','!=','Lab Nurse');
            })->get()->pluck('userpackage_id');
            $packages = UserPackage::whereIn('id',$dates)->where('package_status','Activated')->with(['package','familyname.primary.user','familyname.family'=>function($q){
                $q->where('approved',1)->where('payment_status', 1);
            },'dates.employees'])->get();
            return view('admin.pathologyreport.index', compact('packages'));
        }else {
            return view('viewnotfound');
        }
    }
    
    public function reportView($id)
    {
        if (Gate::any(['GD Doctor','GD Nurse','Fitness Trainer','Dietician'])) {
            $package = UserPackage::with(['familyname.primary.member', 'familyname.family', 'package', 'dates.screening', 'dates.feedback','dates.online.member.user', 'dates.reports.advice','dates.reports.members.user','dates.employees.employee.user', 'payment' => function ($query) {
                $query->latest();
            },'dates'=>function($q){
                $q->latest();
            }])->find($id);
            $employee = Employee::where('employee_id',Auth::user()->id)->first();
            return view('admin.pathologyreport.show', compact('package','employee'));
        } else {
            return view('viewnotfound');
        }
    }

    public function report($package,$screening, $user){
        if (Gate::any(['GD Doctor','GD Nurse','Fitness Trainer','Dietician'])) {
            $employee = Employee::where('employee_id',Auth::user()->id)->first();
            $labprofile = LabProfile::all();
            $labdepartment = LabDepartment::all();
            $labtest = LabTest::all();
            $report = MedicalReport::where('screeningdate_id',$screening)->where('member_id',$user)->with(['members:id,member_id,dob,gender','members.user','screeningdate.screening','screeningdate.userpackage.familyname','screeningdate.userpackage.package:id,package_type','labreports','homeskip','advice'])->first();
            if($report->homeskip == null){
                $team = PackageScreeningTeam::where('screeningdate_id',$screening)->where('employee_id',$employee->id)->first();
                if($team){
                    $advice = DoctorScreeningAdvice::where('package_screening_teams_id',$team->id)->where('report_id',$report->id)->first();
                }else{
                    $advice = null;
                }
            }else{
                $team = PackageScreeningTeam::where('screeningdate_id',$screening)->where('employee_id',$employee->id)->where('online_status',1)->first();
                if($team){
                    $advice = DoctorScreeningAdvice::where('package_screening_teams_id',$team->id)->where('report_id',$report->id)->first();
                }else{
                    $advice = null;
                }
            }
            $charttests = PathologyReport::where('report_id',$report->id)->with(['labtest.labprofile','labtest.labdepartment'])->whereHas('labtest',function($query){
                $query->where('test_result_type','Range');
            })->get();
            $range = PathologyReport::where('report_id',$report->id)->with(['labtest.labprofile','labtest.labdepartment'])->whereHas('labtest',function($query){
                $query->where('test_result_type','Range');
            })->get()->groupBy(['labtest.department_id','labtest.profile_id']);
            $value = PathologyReport::where('report_id',$report->id)->with(['labtest.labprofile','labtest.labdepartment','labvalue'])->whereHas('labtest',function($query){
                $query->where('test_result_type','Value');
            })->get()->groupBy(['labtest.department_id','labtest.profile_id','test_id']);
            $valueImage = PathologyReport::where('report_id',$report->id)->with(['labtest.labprofile','labtest.labdepartment','labvalue'])->whereHas('labtest',function($query){
                $query->where('test_result_type','Value and Image');
            })->get()->groupBy(['labtest.department_id','labtest.profile_id','test_id']);
            $image = PathologyReport::where('report_id',$report->id)->with(['labtest.labprofile','labtest.labdepartment'])->whereHas('labtest',function($query){
                $query->where('test_result_type','Image');
            })->get()->groupBy(['labtest.department_id','labtest.profile_id']);
            return view('admin.pathologyreport.report', compact('package','report','range','value','valueImage','advice','charttests','image','labprofile','labdepartment','labtest'));
        } else {
            return view('viewnotfound');
        }
    }
    //for doctor team

    public function viewChart($id,$member){
        $dates = ScreeningDate::where('userpackage_id',$id)->get()->pluck('id');
        $report = MedicalReport::where('member_id',$member)->whereIn('screeningdate_id',$dates)->with('screeningdate.screening')->get()->pluck('id');
        $tests = PathologyReport::whereIn('report_id',$report)->with(['labtest','reportdetails.screeningdate.screening'])->whereHas('labtest',function($query){
            $query->where('test_result_type','Range');
        })->get()->groupBy('test_id');
        $member = Member::find($member);
        $chart = [];
        $testcount =  0;
        foreach($tests as $test=>$value){
            $count = 0;
            $chart[$testcount]['labtest'] = LabTest::find($test);
            foreach($value as $cd){
                $chart[$testcount]['report'][$count]['screening'] = $cd->reportdetails->screeningdate->screening;
                $chart[$testcount]['report'][$count]['month'] = Carbon::parse($cd->labreport_date)->format('M');
                $chart[$testcount]['report'][$count]['min_range'] = $cd->min_range;
                $chart[$testcount]['report'][$count]['max_range'] = $cd->max_range;
                $chart[$testcount]['report'][$count]['value'] = $cd->value;
                $count++;
            }
            $testcount++;
        }
        // return $chart;
        return view('admin.medicalreport.chart',compact('chart','id','member'));
    }

    public function sampleNotStore(Request $request){
        $request->validate([
            'reason'=>'required',
        ]);
        $employee = Employee::where('employee_id',Auth::user()->id)->first();
        $sample = new SampleNotCollected();
        $sample->employee_id = $employee->id;
        $sample->familyname_id = $request->familyname_id;
        $sample->screeningdate_id = $request->screeningdate_id;
        $sample->medicalreport_id = $request->medicalreport_id;
        $sample->reason = $request->reason;
        $sample->additional_collection_status = $request->additional_collection_status;
        $saved = $sample->save();
        if($sample->additional_collection_status == 1){
            $user = StoreToken::where('user_id', $sample->medicalreport->members->member_id)->first();
            if($user){
                $notification_id = $user->device_key;
                $title = "Sample Collection Notification ";
                $message = "Your lab follow up date has passed. Please visit GD office to drop sample.";
                $type = "Sample";
                send_notification_FCM($notification_id, $title, $message, $type);

                $sampleNotification = new BookingNotification();
                $sampleNotification->user_id = $sample->medicalreport->members->member_id;
                $sampleNotification->image = $sample->medicalreport->members->image_path;
                $sampleNotification->title = $title;
                $sampleNotification->body = $message;
                $sampleNotification->type = $type;
                $sampleNotification->save();
            }
        }
        if($saved){
            return redirect()->back()->with('success','Sample Not Collection Reason Added.');
        }

    }

    public function rejectReport(Request $request){
        if (Gate::allows('Lab Dept Head')) {
            $employee = Employee::where('employee_id',Auth::user()->id)->first();
            $rejectReport = new RejectReport();
            $rejectReport->report_id = $request->report;
            $rejectReport->employee_id = $employee->id;
            $rejectReport->reject_reason = $request->reject_reason;
            $rejectReport->save();

            $report = MedicalReport::find($request->report);
            $report->status = 'Report Rejected';
            $report->update();

            return redirect()->back()->with('success','Report Rejected Successfully. ');
        } else {
            return view('viewnotfound');
        }
    }

    public function overallChart($test,$member){
        if (Gate::any(['SuperAdmin', 'Admin'])) {
            $reportIds = ScreeningReport::with('reportdetail')->whereHas('reportdetail',function($query) use($member){
                $query->where('member_id',$member);
            })->get()->pluck('report_id');
            $reportIds = MedicalReport::where('member_id',$member)->with('pdf')->get()->pluck('id');
            $report = PathologyReport::where('test_id',$test)->whereIn('report_id',$reportIds)->with('labtest')->get();
            $chart = [];
            foreach($report as $item){
                array_push($chart, [$item->created_at->format('M Y'), $item->min_range, $item->max_range, $item->value]);
            }
            $tests = LabTest::find($test);
            return response()->json(['chart' => $chart, 'name' => $tests->tests]);
        } else {
            return view('viewnotfound');
        }
    }


}