<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\OphthalmologistScreeningForm;
use App\Models\RegisterCampaignUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OphthalmologistScreeningFormController extends Controller
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
        if ($request->campaign) {
            $screening = RegisterCampaignUser::where('campaign_id',$request->campaign)->where('campaign_user_id',$request->users)->with(['campaignuser','ophthalmologist'])->first();
        } else {
            $screening = RegisterCampaignUser::with('campaignuser')->whereHas('nurse')->get();
        }
        // $screening = OphthalmologistScreeningForm::with(['registercampaignuser','campaignuser'])->latest()->get();
        return view('admin.ophthalmologist.index',compact('screening','campaign'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $register = RegisterCampaignUser::with('campaignuser')->find($id);
        return view('admin.ophthalmologist.create',compact('register'));
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
            'register_campaign_user_id' => 'required',
            'campaign_user_id' => 'required',
            'ocular_history' => 'required',
            'visual_distance_right' => 'required',
            'visual_distance_left' => 'required',
            'external_exam' => 'required',
            'internal_exam' => 'required',
            'pupillary_reflex' => 'required',
            'binocular_function' => 'required',
            'accommodation_vergence' => 'required',
            'color_vision' => 'required',
            'glaucoma_evaluation' => 'required',
            'oculomotor_assessment' => 'required',
            'diagnosis' => 'required',
            'corrective_lenses' => 'required',
            'reexamination' => 'required',
            'advice' => 'required',
        ]);

        $screening = new OphthalmologistScreeningForm();
        $screening->register_campaign_user_id = $request->register_campaign_user_id;
        $screening->campaign_user_id = $request->campaign_user_id;
        $screening->doctor_id = Auth::user()->employee->id;
        $screening->ocular_history = $request->ocular_history;
        $screening->ocular_history_positive = $request->ocular_history_positive;
        $screening->visual_distance_right = $request->visual_distance_right;
        $screening->visual_distance_left = $request->visual_distance_left;
        $screening->external_exam = $request->external_exam;
        $screening->external_exam_comment = $request->external_exam_comment;
        $screening->internal_exam = $request->internal_exam;
        $screening->internal_exam_comment = $request->internal_exam_comment;
        $screening->pupillary_reflex = $request->pupillary_reflex;
        $screening->pupillary_reflex_comment = $request->pupillary_reflex_comment;
        $screening->binocular_function = $request->binocular_function;
        $screening->binocular_function_comment = $request->binocular_function_comment;
        $screening->accommodation_vergence = $request->accommodation_vergence;
        $screening->accommodation_vergence_comment = $request->accommodation_vergence_comment;
        $screening->color_vision = $request->color_vision;
        $screening->color_vision_comment = $request->color_vision_comment;
        $screening->glaucoma_evaluation = $request->glaucoma_evaluation;
        $screening->glaucoma_evaluation_comment = $request->glaucoma_evaluation_comment;
        $screening->oculomotor_assessment = $request->oculomotor_assessment;
        $screening->oculomotor_assessment_comment = $request->oculomotor_assessment_comment;
        $screening->other_comment = $request->other_comment;
        $screening->diagnosis = $request->diagnosis;
        $screening->other_diagnosis = $request->other_diagnosis;
        $screening->corrective_lenses = $request->corrective_lenses;
        $screening->glass_contact = $request->glass_contact;
        $screening->reexamination = $request->reexamination;
        $screening->reexamination_other = $request->reexamination_other;
        $screening->advice = $request->advice;
        $saved = $screening->save();
        if($saved){
            return redirect()->route('ophthalmologist.index')->with('success','Ophthalmologist Screening Added Successfully.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OphthalmologistScreeningForm  $ophthalmologistScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $screening = RegisterCampaignUser::with(['campaignuser','campaign','nurse','doctor','ophthalmologist','dentist','dietician','physio'])->find($id);
        $route = 'ophthalmologist.index';
        $screening_name = 'Ophthalmologist Screening Form';
        return view('admin.campaignUsers.view',compact('screening','route','screening_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OphthalmologistScreeningForm  $ophthalmologistScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $screening = OphthalmologistScreeningForm::with('campaignuser')->find($id);
        return view('admin.ophthalmologist.edit',compact('screening'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OphthalmologistScreeningForm  $ophthalmologistScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ocular_history' => 'required',
            'visual_distance_right' => 'required',
            'visual_distance_left' => 'required',
            'external_exam' => 'required',
            'internal_exam' => 'required',
            'pupillary_reflex' => 'required',
            'binocular_function' => 'required',
            'accommodation_vergence' => 'required',
            'color_vision' => 'required',
            'glaucoma_evaluation' => 'required',
            'oculomotor_assessment' => 'required',
            'diagnosis' => 'required',
            'corrective_lenses' => 'required',
            'reexamination' => 'required',
            'advice' => 'required',
        ]);

        $screening = OphthalmologistScreeningForm::find($id);
        $screening->doctor_id = Auth::user()->employee->id;
        $screening->ocular_history = $request->ocular_history;
        $screening->ocular_history_positive = ($request->ocular_history == 'Positive' ? $request->ocular_history_positive : null);
        $screening->visual_distance_right = $request->visual_distance_right;
        $screening->visual_distance_left = $request->visual_distance_left;
        $screening->external_exam = $request->external_exam;
        $screening->external_exam_comment = ($request->external_exam != 'Normal' ? $request->external_exam_comment : null);
        $screening->internal_exam = $request->internal_exam;
        $screening->internal_exam_comment = ($request->internal_exam != 'Normal' ? $request->internal_exam_comment : null);
        $screening->pupillary_reflex = $request->pupillary_reflex;
        $screening->pupillary_reflex_comment = ($request->pupillary_reflex != 'Normal' ? $request->pupillary_reflex_comment : null);
        $screening->binocular_function = $request->binocular_function;
        $screening->binocular_function_comment = ($request->binocular_function != 'Normal' ? $request->binocular_function_comment : null);
        $screening->accommodation_vergence = $request->accommodation_vergence;
        $screening->accommodation_vergence_comment = ($request->accommodation_vergence != 'Normal' ? $request->accommodation_vergence_comment : null);
        $screening->color_vision = $request->color_vision;
        $screening->color_vision_comment = ($request->color_vision != 'Normal' ? $request->color_vision_comment : null);
        $screening->glaucoma_evaluation = $request->glaucoma_evaluation;
        $screening->glaucoma_evaluation_comment = ($request->glaucoma_evaluation != 'Normal' ? $request->glaucoma_evaluation_comment : null);
        $screening->oculomotor_assessment = $request->oculomotor_assessment;
        $screening->oculomotor_assessment_comment = ($request->oculomotor_assessment != 'Normal' ? $request->oculomotor_assessment_comment : null);
        $screening->other_comment = $request->other_comment;
        $screening->diagnosis = $request->diagnosis;
        $screening->other_diagnosis = ($request->diagnosis == 'Other' ? $request->other_diagnosis : null);
        $screening->corrective_lenses = $request->corrective_lenses;
        $screening->glass_contact = ($request->corrective_lenses == 'Yes' ? $request->glass_contact : null);
        $screening->reexamination = $request->reexamination;
        $screening->reexamination_other = ($request->reexamination == 'Other' ? $request->reexamination_other : null);
        $screening->advice = $request->advice;
        $saved = $screening->update();
        if($saved){
            return redirect()->route('ophthalmologist.index')->with('success','Ophthalmologist Screening Updated Successfully.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OphthalmologistScreeningForm  $ophthalmologistScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(OphthalmologistScreeningForm $ophthalmologistScreeningForm)
    {
        //
    }
}
