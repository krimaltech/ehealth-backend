<?php

namespace App\Http\Controllers;

use App\Models\NurseScreeningForm;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NurseScreeningFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nurseScreeningForm = NurseScreeningForm::with('campaignuser')->get();
        return view('admin.nursescreeningform.index',compact('nurseScreeningForm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->employee->id;
        $campaign = Campaign::where('status',1)->with('employees')->whereHas('employees',function($query) use($id){
            $query->where('employee_id',$id);
        })->latest()->get();
        return view('admin.nursescreeningform.create',compact('campaign'));
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
        $nurse = new NurseScreeningForm();
        $nurse->campaign_user_id = $request->campaign_user_id;
        $nurse->register_campaign_user_id = $request->register_campaign_user_id;
        $nurse->doctor_id = Auth::user()->employee->id;
        $nurse->past_illness = $request->past_illness;
        $nurse->past_illness_comment = $request->past_illness_comment;
        $nurse->hospitalization = $request->hospitalization;
        $nurse->hospitalization_comment = $request->hospitalization_comment;
        $nurse->injuries_accident = $request->injuries_accident;
        $nurse->injuries_accident_comment = $request->injuries_accident_comment;
        $nurse->surgeries = $request->surgeries;
        $nurse->surgeries_comment = $request->surgeries_comment;
        $nurse->temperature = $request->temperature;
        $nurse->pulse = $request->pulse;
        $nurse->resp = $request->resp;
        $nurse->spo2 = $request->spo2;
        $nurse->bp = $request->bp;
        $nurse->muac = $request->muac;
        $nurse->height = $request->height;
        $nurse->weight = $request->weight;
        $nurse->environmental_factor = $request->environmental_factor;
        $nurse->food_allergie = $request->food_allergie;
        $nurse->durg_allergie = $request->durg_allergie;
        $nurse->insect_allergie = $request->insect_allergie;
        $nurse->environmental_factor_comment = $request->environmental_factor_comment;
        $nurse->food_allergie_comment = $request->food_allergie_comment;
        $nurse->durg_allergie_comment = $request->durg_allergie_comment;
        $nurse->insect_allergie_comment = $request->insect_allergie_comment;
        $nurse->drug_history = $request->drug_history;
        $nurse->drug_history_comment = $request->drug_history_comment;
        $nurse->mentural_history = $request->mentural_history;
        $nurse->mentural_history_comment = $request->mentural_history_comment;
        $nurse->family_history = $request->family_history;
        $nurse->family_history_details = $request->family_history_details;
        $nurse->childhood_disease = $request->childhood_disease;
        $nurse->childhood_disease_comment = $request->childhood_disease_comment;
        $nurse->immunization = $request->immunization;
        $nurse->save();
        return redirect()->route('nurse-screening-form.index')->with('success', 'Nurse Screening Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NurseScreeningForm  $nurseScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nurseScreeningForm = NurseScreeningForm::findOrFail($id);
        return view('admin.nursescreeningform.show',compact('nurseScreeningForm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NurseScreeningForm  $nurseScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nurseScreeningForm = NurseScreeningForm::findOrFail($id);
        return view('admin.nursescreeningform.edit',compact('nurseScreeningForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NurseScreeningForm  $nurseScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $nurse = NurseScreeningForm::findOrFail($id);
        $nurse->past_illness = $request->past_illness;
        $nurse->past_illness_comment = $request->past_illness_comment;
        $nurse->hospitalization = $request->hospitalization;
        $nurse->hospitalization_comment = $request->hospitalization_comment;
        $nurse->injuries_accident = $request->injuries_accident;
        $nurse->injuries_accident_comment = $request->injuries_accident_comment;
        $nurse->surgeries = $request->surgeries;
        $nurse->surgeries_comment = $request->surgeries_comment;
        $nurse->temperature = $request->temperature;
        $nurse->pulse = $request->pulse;
        $nurse->resp = $request->resp;
        $nurse->spo2 = $request->spo2;
        $nurse->bp = $request->bp;
        $nurse->muac = $request->muac;
        $nurse->height = $request->height;
        $nurse->weight = $request->weight;
        $nurse->environmental_factor = $request->environmental_factor;
        $nurse->food_allergie = $request->food_allergie;
        $nurse->durg_allergie = $request->durg_allergie;
        $nurse->insect_allergie = $request->insect_allergie;
        $nurse->environmental_factor_comment = $request->environmental_factor_comment;
        $nurse->food_allergie_comment = $request->food_allergie_comment;
        $nurse->durg_allergie_comment = $request->durg_allergie_comment;
        $nurse->insect_allergie_comment = $request->insect_allergie_comment;
        $nurse->drug_history = $request->drug_history;
        $nurse->drug_history_comment = $request->drug_history_comment;
        $nurse->mentural_history = $request->mentural_history;
        $nurse->mentural_history_comment = $request->mentural_history_comment;
        $nurse->family_history = $request->family_history;
        $nurse->childhood_disease = $request->childhood_disease;
        $nurse->childhood_disease_comment = $request->childhood_disease_comment;
        $nurse->immunization = $request->immunization;
        $nurse->update();
        return redirect()->route('nurse-screening-form.index')->with('success', 'Nurse Screening Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NurseScreeningForm  $nurseScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(NurseScreeningForm $nurseScreeningForm)
    {
        //
    }
}
