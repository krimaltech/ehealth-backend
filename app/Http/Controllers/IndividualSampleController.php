<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\MedicalReport;
use App\Models\SampleDropTeam;
use App\Models\ScreeningDate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndividualSampleController extends Controller
{
    public function index(){
        $employee = Employee::where('employee_id',Auth::user()->id)->first();
        $sample = SampleDropTeam::where('employee_id',$employee->id)->with(['familyname','screeningdate','medicalreport','employee'])->get();
        return view('admin.individualSample.index',compact('sample'));
    }

    public function store(Request $request,$id){
        $employee = Employee::where('employee_id',Auth::user()->id)->first();
        $sample = MedicalReport::find($request->report);
        $sample->sample_date = Carbon::now()->format('Y-m-d H:i:s');
        $sample->status = 'Sample Collected';
        $sample->collected_by = $employee->id;
        $sample->sample_info = $request->sample_info;
        $saved = $sample->update();

        $sampleDrop = SampleDropTeam::find($id);
        $sampleDrop->collection_status = 1;
        $sampleDrop->update();

        if($saved){
            return redirect()->back()->with('success','Sample Collection Details Added.');
        }

    }
}
