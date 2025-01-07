<?php

namespace App\Http\Controllers;

use App\Models\MedicalReport;
use App\Models\ScreeningDate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SkipSampleController extends Controller
{
    public function index(){
        $reports = ScreeningDate::where('status','Lab In Progress')->with(['reports'=>function($query){
            $query->where('status','Sample to be collected');
        },'reports.members.user','userpackage.package','userpackage.familyname'])->whereHas('additionalnosample')->whereHas('reports',function($query){
            $query->whereIn('status', ['Report Verified', 'Sample to be collected']);
        })->get();
        //return $reports;
        return view('admin.skipSample.index',compact('reports'));
    }

    public function show($id){
        $date = ScreeningDate::with(['userpackage.package','userpackage.familyname','reports.members.user'])->find($id);
        //return $date;
        return view('admin.skipSample.show',compact('date'));
    }

    public function store(Request $request){
        $request->validate([
            'skip_reason' => 'required'
        ]); 
        $report = MedicalReport::find($request->report);
        $report->skip_reason = $request->skip_reason;
        $report->status = 'Skipped';
        $saved = $report->update();
        if($saved){
            $totalreport = MedicalReport::where('screeningdate_id',$report->screeningdate_id)->count();
            $verifiedReport = MedicalReport::where('screeningdate_id',$report->screeningdate_id)->whereIn('status',['Report Verified','Skipped'])->count();
            if($totalreport == $verifiedReport){ 
                $screening = ScreeningDate::find($report->screeningdate_id);
                $screening->status = 'Report Generated';
                $screening->labreport_date = Carbon::now();
                $screening->update();
            }
        }
        return redirect()->back()->with('success','Member skipped successfully.');
    }
}
