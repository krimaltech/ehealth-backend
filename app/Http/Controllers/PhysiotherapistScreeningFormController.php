<?php

namespace App\Http\Controllers;

use App\Models\PhysiotherapistScreeningForm;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\RegisterCampaignUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhysiotherapistScreeningFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = Auth::user()->employee->id;
        $campaign = Campaign::where('status',1)->with('employees')->whereHas('employees',function($query) use($id){
            $query->where('employee_id',$id);
        })->latest()->get();
        $campaign_user = $request->campaign;
        if ($request->campaign) {
           $screening = RegisterCampaignUser::where('campaign_id',$request->campaign)->where('campaign_user_id',$request->users)->with(['campaignuser','physio'])->first();
        } else {
            $screening = RegisterCampaignUser::with('campaignuser')->whereHas('nurse')->get();
        }
        return view('admin.physioscreeningform.index',compact('screening','campaign_user','campaign'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $screening = RegisterCampaignUser::with(['campaignuser'])->find($id);
        return view('admin.physioscreeningform.create',compact('screening'));
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
            'campaign_user_id' => 'required',
        ]);
        $physioScreeningForm = new PhysiotherapistScreeningForm();
        $physioScreeningForm->campaign_user_id = $request->campaign_user_id;
        $physioScreeningForm->register_campaign_user_id = $request->register_campaign_user_id;
        $physioScreeningForm->doctor_id = Auth::user()->employee->id;
        $physioScreeningForm->chief_complaint = $request->chief_complaint;
        $physioScreeningForm->hopi = $request->hopi;
        $physioScreeningForm->posture = $request->posture;
        $physioScreeningForm->adl = $request->adl;
        $physioScreeningForm->site_side = $request->site_side;
        $physioScreeningForm->how_pain_start = $request->how_pain_start;
        $physioScreeningForm->type = $request->type;
        $physioScreeningForm->nrs = $request->nrs;
        $physioScreeningForm->temporal_variation = $request->temporal_variation;
        $physioScreeningForm->aggravating_factor = $request->aggravating_factor;
        $physioScreeningForm->relieving_factor = $request->relieving_factor;
        $physioScreeningForm->past_medical_history = $request->past_medical_history;
        $physioScreeningForm->appetite = $request->appetite;
        $physioScreeningForm->sleep = $request->sleep;
        $physioScreeningForm->habit = $request->habit;
        $physioScreeningForm->range_of_motion = $request->range_of_motion;
        $physioScreeningForm->mmt = $request->mmt;
        $physioScreeningForm->problem_list = $request->problem_list;
        $physioScreeningForm->physio_management = $request->physio_management;
        $physioScreeningForm->save();
        return redirect()->route('physio-screening-form.index')->with('success', 'Physiotherapist Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhysiotherapistScreeningForm  $physiotherapistScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $screening = RegisterCampaignUser::with(['campaignuser','campaign','nurse','doctor','ophthalmologist','dentist','dietician','physio'])->find($id);
        $route = 'physio-screening-form.index';
        $screening_name = 'Physiotherapist Screening Form';
        return view('admin.campaignUsers.view',compact('screening','route','screening_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhysiotherapistScreeningForm  $physiotherapistScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $physioScreeningForm = PhysiotherapistScreeningForm::findOrFail($id);
        return view('admin.physioscreeningform.edit',compact('physioScreeningForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhysiotherapistScreeningForm  $physiotherapistScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $physioScreeningForm = PhysiotherapistScreeningForm::findOrFail($id);
        $physioScreeningForm->doctor_id = Auth::user()->employee->id;
        $physioScreeningForm->chief_complaint = $request->chief_complaint;
        $physioScreeningForm->hopi = $request->hopi;
        $physioScreeningForm->posture = $request->posture;
        $physioScreeningForm->adl = $request->adl;
        $physioScreeningForm->site_side = $request->site_side;
        $physioScreeningForm->how_pain_start = $request->how_pain_start;
        $physioScreeningForm->type = $request->type;
        $physioScreeningForm->nrs = $request->nrs;
        $physioScreeningForm->temporal_variation = $request->temporal_variation;
        $physioScreeningForm->aggravating_factor = $request->aggravating_factor;
        $physioScreeningForm->relieving_factor = $request->relieving_factor;
        $physioScreeningForm->past_medical_history = $request->past_medical_history;
        $physioScreeningForm->appetite = $request->appetite;
        $physioScreeningForm->sleep = $request->sleep;
        $physioScreeningForm->habit = $request->habit;
        $physioScreeningForm->range_of_motion = $request->range_of_motion;
        $physioScreeningForm->mmt = $request->mmt;
        $physioScreeningForm->problem_list = $request->problem_list;
        $physioScreeningForm->physio_management = $request->physio_management;
        $physioScreeningForm->save();


        return redirect()->route('physio-screening-form.index')->with('success', 'Physiotherapist Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhysiotherapistScreeningForm  $physiotherapistScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhysiotherapistScreeningForm $physiotherapistScreeningForm)
    {
        //
    }
}
