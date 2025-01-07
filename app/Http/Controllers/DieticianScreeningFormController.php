<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\DieticianScreeningForm;
use App\Models\NurseScreeningForm;
use App\Models\RegisterCampaignUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DieticianScreeningFormController extends Controller
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
            $screening = RegisterCampaignUser::where('campaign_id',$request->campaign)->where('campaign_user_id',$request->users)->with(['campaignuser','dietician'])->first();
        } else {
            $screening = RegisterCampaignUser::with('campaignuser')->whereHas('nurse')->get();
        }
        // $screening = DieticianScreeningForm::latest()->get();
        return view('admin.dietician.index',compact('screening','campaign'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $register = RegisterCampaignUser::with('campaignuser')->find($id);
        return view('admin.dietician.create',compact('register'));
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
            'chief_complaint' => 'required',
            'how_eat_daily' => 'required',
            'what_eat_daily' => 'required',
            'junk_food' => 'required',
            'extracurricular' => 'required',
            'problems' => 'required',
            'dietary_management' => 'required',
        ]); 

        $screening = new DieticianScreeningForm();
        $screening->campaign_user_id = $request->campaign_user_id;
        $screening->register_campaign_user_id = $request->register_campaign_user_id;
        $screening->doctor_id = Auth::user()->employee->id;
        $screening->chief_complaint = $request->chief_complaint;
        $screening->how_eat_daily = $request->how_eat_daily;
        $screening->what_eat_daily = $request->what_eat_daily;
        $screening->junk_food = $request->junk_food;
        $screening->extracurricular = $request->extracurricular;
        $screening->problems = $request->problems;
        $screening->dietary_management = $request->dietary_management;
        $saved = $screening->save();
        if($saved){
            return redirect()->route('dietician.index')->with('success','Dietician Screening Added Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DieticianScreeningForm  $dieticianScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $screening = RegisterCampaignUser::with(['campaignuser','campaign','nurse','doctor','ophthalmologist','dentist','dietician','physio'])->find($id);
        $route = 'dietician.index';
        $screening_name = 'Dietician Screening Form';
        return view('admin.campaignUsers.view',compact('screening','route','screening_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DieticianScreeningForm  $dieticianScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $screening = DieticianScreeningForm::with('campaignuser')->find($id);
        return view('admin.dietician.edit',compact('screening'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DieticianScreeningForm  $dieticianScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'chief_complaint' => 'required',
            'how_eat_daily' => 'required',
            'what_eat_daily' => 'required',
            'junk_food' => 'required',
            'extracurricular' => 'required',
            'problems' => 'required',
            'dietary_management' => 'required',
        ]); 

        $screening = DieticianScreeningForm::find($id);
        $screening->doctor_id = Auth::user()->employee->id;
        $screening->chief_complaint = $request->chief_complaint;
        $screening->how_eat_daily = $request->how_eat_daily;
        $screening->what_eat_daily = $request->what_eat_daily;
        $screening->junk_food = $request->junk_food;
        $screening->extracurricular = $request->extracurricular;
        $screening->problems = $request->problems;
        $screening->dietary_management = $request->dietary_management;
        $saved = $screening->update();
        if($saved){
            return redirect()->route('dietician.index')->with('success','Dietician Screening Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DieticianScreeningForm  $dieticianScreeningForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(DieticianScreeningForm $dieticianScreeningForm)
    {
        //
    }
}
