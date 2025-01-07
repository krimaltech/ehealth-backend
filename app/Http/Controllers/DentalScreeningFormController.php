<?php

namespace App\Http\Controllers;

use App\Models\DentalScreeningForm;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\RecommendedScreeningFiles;
use App\Models\RegisterCampaignUser;
use App\Models\ScreeningRecommendFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DentalScreeningFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = Auth::user()->employee->id;
        $campaign = Campaign::where('status', 1)->with('employees')->whereHas('employees', function ($query) use ($id) {
            $query->where('employee_id', $id);
        })->latest()->get();
        $campaign_user = $request->campaign;
        if ($request->campaign) {
            $screening = RegisterCampaignUser::where('campaign_id', $request->campaign)->where('campaign_user_id', $request->users)->with(['campaignuser', 'dentist'])->first();
        } else {
            $screening = RegisterCampaignUser::with('campaignuser')->whereHas('nurse')->get();
        }
        return view('admin.dentalscreeningform.index', compact('campaign_user', 'screening', 'campaign'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $recommendfiles = ScreeningRecommendFiles::where('category', 'Dentist')->get();
        $screening = RegisterCampaignUser::with(['campaignuser'])->find($id);
        return view('admin.dentalscreeningform.create', compact('screening', 'recommendfiles'));
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
        $dentalScreeningForm = new DentalScreeningForm();
        $dentalScreeningForm->campaign_user_id = $request->campaign_user_id;
        $dentalScreeningForm->register_campaign_user_id = $request->register_campaign_user_id;
        $dentalScreeningForm->doctor_id = Auth::user()->employee->id;
        $dentalScreeningForm->dental_history = $request->dental_history;
        $dentalScreeningForm->last_visit_date = $request->last_visit_date;
        $dentalScreeningForm->treated_condition = $request->treated_condition;
        $dentalScreeningForm->dental_habit = $request->dental_habit;
        $dentalScreeningForm->tobacco_products = $request->tobacco_products;
        $dentalScreeningForm->dental_floss = $request->dental_floss;
        $dentalScreeningForm->dental_brush = $request->dental_brush;
        $dentalScreeningForm->current_dental = $request->current_dental;
        $dentalScreeningForm->prevention = $request->prevention;
        $dentalScreeningForm->diagnosis = $request->diagnosis;
        $dentalScreeningForm->brush_type = $request->brush_type;
        $dentalScreeningForm->toothpaste_type = $request->toothpaste_type;
        $dentalScreeningForm->save();
        foreach ($request->file_id as $value) {
            $recommendfiles = new RecommendedScreeningFiles();
            $recommendfiles->screening_id = $dentalScreeningForm->id;
            $recommendfiles->file_id = (int)$value;
            $recommendfiles->save();
        }
        return redirect()->route('dental-screening-form.index')->with('success', 'Dental Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DentalScreeningForm  $dentalScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $screening = RegisterCampaignUser::with(['campaignuser', 'campaign', 'nurse', 'doctor', 'ophthalmologist', 'dentist', 'dietician', 'physio'])->find($id);
        $route = 'dental-screening-form.index';
        $screening_name = 'Dental Screening Form';
        return view('admin.campaignUsers.view', compact('screening', 'route', 'screening_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DentalScreeningForm  $dentalScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recommendfiles = ScreeningRecommendFiles::where('category', 'Dentist')->get();
        $recommendscreeningfiles = RecommendedScreeningFiles::where('screening_id', $id)->get();
        $selected_files_ids = [];
        foreach ($recommendscreeningfiles as $item) {
            array_push($selected_files_ids, $item->file_id);
        }
        $dentalScreeningForm = DentalScreeningForm::findOrFail($id);
        return view('admin.dentalscreeningform.edit', compact('dentalScreeningForm', 'recommendfiles', 'selected_files_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DentalScreeningForm  $dentalScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dentalScreeningForm = DentalScreeningForm::findOrFail($id);
        $dentalScreeningForm->dental_history = $request->dental_history;
        $dentalScreeningForm->last_visit_date = $request->last_visit_date;
        $dentalScreeningForm->treated_condition = $request->treated_condition;
        $dentalScreeningForm->dental_habit = $request->dental_habit;
        $dentalScreeningForm->tobacco_products = $request->tobacco_products;
        $dentalScreeningForm->dental_floss = $request->dental_floss;
        $dentalScreeningForm->dental_brush = $request->dental_brush;
        $dentalScreeningForm->current_dental = $request->current_dental;
        $dentalScreeningForm->prevention = $request->prevention;
        $dentalScreeningForm->diagnosis = $request->diagnosis;
        $dentalScreeningForm->brush_type = $request->brush_type;
        $dentalScreeningForm->toothpaste_type = $request->toothpaste_type;
        $dentalScreeningForm->save();
        foreach ($request->file_id as $value) {
            $recommendfiles = RecommendedScreeningFiles::where('screening_id', $dentalScreeningForm->id)->get();
            $selected_files_ids = [];
            foreach ($recommendfiles as $item) {
                array_push($selected_files_ids, $item->file_id);
            }
            if (!in_array($value, $selected_files_ids)) {
                $recommendfiles = new RecommendedScreeningFiles();
                $recommendfiles->screening_id = $dentalScreeningForm->id;
                $recommendfiles->file_id = (int)$value;
                $recommendfiles->save();
            } else {
                RecommendedScreeningFiles::where('file_id', $value)->delete();
            }
        }
        return redirect()->route('dental-screening-form.index')->with('success', 'Dental Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DentalScreeningForm  $dentalScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(DentalScreeningForm $dentalScreeningForm)
    {
        //
    }
}
