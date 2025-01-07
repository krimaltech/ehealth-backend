<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\MedicalReport;
use App\Models\SampleDropTeam;
use App\Models\SampleNotCollected;
use App\Models\ScreeningDate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SampleDropTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sample = SampleDropTeam::with(['familyname','screeningdate','medicalreport','employee'])->get();
        return view('admin.sampleDrop.index',compact('sample'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = SampleNotCollected::where('additional_collection_status',1)->with(['familyname','medicalreport.members.user'])->whereHas('medicalreport',function($query){
            $query->where('status','Sample to be collected')->doesntHave('sampleDrop');
        })->get();
        $lab = ScreeningDate::where('screening_date',Carbon::now()->format('Y-m-d'))->with(['employees'=>function($query){
            $query->where('type','Lab Technician')->orWhere('type','Lab Nurse');
        }])->get()->pluck('employees.*.employee_id');
        if(!$lab->isEmpty()){
            $labuser = Employee::whereNotIn('id',$lab[0])->whereIn('sub_role_id',[2,7])->get();
        }else{
            $labuser = [];
        }
        return view('admin.sampleDrop.create',compact('user','labuser'));
    }

    public function fetchDetails($id)
    {
        $report = MedicalReport::with(['screeningdate:id,screening_id,userpackage_id','screeningdate.userpackage:id,familyname_id,package_id','screeningdate.userpackage.package:id,package_type','screeningdate.screening','screeningdate.userpackage.familyname'])->find($id);
        return response()->json($report);
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
            'user' => 'required',
            'employee_id' => 'required',
        ]);

        $sample = new SampleDropTeam();
        $sample->employee_id  = $request->employee_id;
        $sample->familyname_id  = $request->familyname;
        $sample->screeningdate_id  = $request->screeningdate;
        $sample->medicalreport_id  = $request->user;
        $saved = $sample->save();
        if($saved){
            return redirect()->route('sampleDrop.index')->with('success','Sample Collection User Assigned Successfully.');
        }
    }
}
