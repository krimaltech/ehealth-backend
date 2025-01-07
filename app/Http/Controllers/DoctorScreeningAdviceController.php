<?php

namespace App\Http\Controllers;

use App\Models\DoctorScreeningAdvice;
use App\Models\Employee;
use App\Models\MedicalReport;
use App\Models\PackageScreeningTeam;
use App\Models\ScreeningDate;
use App\Models\SkipHomeVisit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorScreeningAdviceController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'feedback' => 'required',
        ]);
        $employee = Employee::where('employee_id',Auth::user()->id)->first();
        $team = PackageScreeningTeam::where('screeningdate_id',$request->screeningdate_id)->where('employee_id',$employee->id)->first();
        $advice = new DoctorScreeningAdvice();
        $advice->package_screening_teams_id = $team->id;
        $advice->report_id = $request->report_id;
        $advice->feedback = $request->feedback;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('file')) {
            $images = storeImageLaravel($request, 'file', 'file_path');
            $advice->file = $images[0];
            $advice->file_path = $images[1];
            }
        } else 
        {
            if ($request->hasFile('file')) {
            $images = storeImageStorage($request, 'file', 'file_path');
            $advice->file = $images[0];
            $advice->file_path = $images[1];
            }
        }
        $advice->save();

        $teams = PackageScreeningTeam::where('screeningdate_id',$request->screeningdate_id)->where('type','!=','Lab Technician')->where('type','!=','Lab Nurse')->where('online_status',0)->get()->count();
        $advices = DoctorScreeningAdvice::where('report_id',$request->report_id)->get()->count();
        if($teams == $advices){
            $report = MedicalReport::find($request->report_id);
            $report->status = 'Consultation Report';
            $report->consultation_report_date = Carbon::now();
            $report->update();

            //if user lab visit was skipped
            $skipReport = MedicalReport::where('screeningdate_id',$request->screeningdate_id)->where('sample_date',null)->where('status','Doctor Visit')->get();
            foreach($skipReport as $skip){
                $skip->status = 'Consultation Skipped';
                $skip->update();
            }

            $totalreport = MedicalReport::where('screeningdate_id',$request->screeningdate_id)->count();
            $completedcount = MedicalReport::where('screeningdate_id',$request->screeningdate_id)->whereIn('status',['Consultation Report','Consultation Skipped'])->count();
            if($totalreport == $completedcount){
                $screening = ScreeningDate::find($request->screeningdate_id);
                $screening->status = 'Doctor Visit Completed';
                $screening->doctorreport_date = Carbon::now();
                $screening->update();
            }
        }

        return redirect()->back()->with('success', 'Report Findings Added Successfully');
    }

    public function skipStore(Request $request){
        $request->validate([
            'reason' => 'required'
        ]);

        $employee = Employee::where('employee_id',Auth::user()->id)->first();
        $skip = new SkipHomeVisit();
        $skip->employee_id = $employee->id;
        $skip->familyname_id = $request->familyname;
        $skip->screeningdate_id = $request->screeningdate;
        $skip->medicalreport_id = $request->report;
        $skip->reason = $request->reason;
        $saved = $skip->save();
        if($saved){
            return redirect()->back()->with('success','Member Skipped Successfully.');
        }
    }
}
