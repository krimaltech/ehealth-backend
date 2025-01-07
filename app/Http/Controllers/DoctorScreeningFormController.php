<?php

namespace App\Http\Controllers;

use App\Models\DoctorScreeningForm;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\RegisterCampaignUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorScreeningFormController extends Controller
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
            $screening = RegisterCampaignUser::where('campaign_id', $request->campaign)->where('campaign_user_id', $request->users)->with(['campaignuser', 'doctor'])->first();
        } else {
            $screening = RegisterCampaignUser::with('campaignuser')->whereHas('nurse')->get();
        }
        return view('admin.doctorscreeningform.index', compact('screening', 'campaign', 'campaign_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $screening = RegisterCampaignUser::with(['campaignuser'])->find($id);
        return view('admin.doctorscreeningform.create', compact('screening'));
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
        $doctorScreeningForm = new DoctorScreeningForm();
        $doctorScreeningForm->campaign_user_id = $request->campaign_user_id;
        $doctorScreeningForm->register_campaign_user_id = $request->register_campaign_user_id;
        $doctorScreeningForm->doctor_id = Auth::user()->employee->id;
        $doctorScreeningForm->chief_complaint = $request->chief_complaint;
        $doctorScreeningForm->treatment_medication = $request->treatment_medication;
        $doctorScreeningForm->investigation = $request->investigation;
        $doctorScreeningForm->prevention = $request->prevention;
        $doctorScreeningForm->save();
        return redirect()->route('doctor-screening-form.index')->with('success', 'Doctor Screening Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorScreeningForm  $doctorScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $screening = RegisterCampaignUser::with(['campaignuser', 'campaign', 'nurse', 'doctor', 'ophthalmologist', 'dentist', 'dietician', 'physio'])->find($id);
        $route = 'doctor-screening-form.index';
        $screening_name = 'Doctor Screening Form';
        return view('admin.campaignUsers.view', compact('screening', 'route', 'screening_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorScreeningForm  $doctorScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctorScreeningForm = DoctorScreeningForm::findOrFail($id);
        return view('admin.doctorscreeningform.edit', compact('doctorScreeningForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DoctorScreeningForm  $doctorScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doctorScreeningForm = DoctorScreeningForm::findOrFail($id);
        $doctorScreeningForm->chief_complaint = $request->chief_complaint;
        $doctorScreeningForm->treatment_medication = $request->treatment_medication;
        $doctorScreeningForm->investigation = $request->investigation;
        $doctorScreeningForm->prevention = $request->prevention;
        $doctorScreeningForm->save();
        return redirect()->route('doctor-screening-form.index')->with('success', 'Doctor Screening Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorScreeningForm  $doctorScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorScreeningForm $doctorScreeningForm)
    {
        //
    }
}
