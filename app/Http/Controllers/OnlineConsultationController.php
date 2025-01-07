<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Family;
use App\Models\FamilyName;
use App\Models\MedicalReport;
use App\Models\Member;
use App\Models\OnlineConsultation;
use App\Models\OnlineConsultationMeeting;
use App\Models\ScreeningDate;
use Illuminate\Http\Request;
use App\Traits\ZoomJWT;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OnlineConsultationController extends Controller
{
    use ZoomJWT;

    const MEETING_TYPE_SCHEDULE = 2;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onlineConsultation = OnlineConsultationMeeting::with('member.user:id,name')->latest()->get();
        return view('admin.onlineconsultation.index',compact('onlineConsultation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'family_no' => 'required',
            'screening_time' => 'required',
            'limit' => 'required',
        ]);

        $start_time = Carbon::parse($request->screening_time);
        $family_no = $request->family_no;
        $interval = $request->limit;
        $time_intervals = [];
        // loop through the number of intervals and add the start time and time gap to each interval
        for ($i = 0; $i < $family_no; $i++) {
            // add the start time to the time gap multiplied by the interval index
            $interval_time = $start_time->copy()->addMinutes($interval * $i);            
            // add the interval time to the time intervals array
            $time_intervals[] = $interval_time->format('H:i:s');
        }

        $date = ScreeningDate::find($id);
        $reports = MedicalReport::where('screeningdate_id',$id)->get();
        for ($j = 0; $j < count($reports); $j++) {
            $newDate = date("Y-m-d", strtotime($date->doctorvisit_date));
            $datetime = $newDate .' '. $time_intervals[$j];
            $time = Carbon::createFromFormat('Y-m-d H:i:s', $datetime , 'Asia/Kathmandu');
            $startTime = $time->format('Y-m-d\TH:i:s');
            $path = 'users/me/meetings';
            $response = $this->zoomPost($path, [
                'topic' =>'Screening Online Consultation',
                'type' => self::MEETING_TYPE_SCHEDULE,
                'start_time' => $startTime,
                'duration' => $interval,
                'timezone' => 'Asia/Kathmandu', 
                'agenda' => 'Online Consultation of screening',
                'settings' => [
                    'host_video' => false,
                    'participant_video' => false,
                    'waiting_room' => true,
                ],
            ]);
           
            $meeting = new OnlineConsultation();
            $meeting->screeningdate_id = $id;
            $meeting->member_id = $reports[$j]['member_id'];
            $meeting->start_time = $datetime;
            $meeting->join_url = $response['join_url'];
            $meeting->start_url = $response['start_url'];
            $meeting->meeting_id = $response['id'];
            $meeting->meeting_password = $response['encrypted_password'];
            $saved = $meeting->save();
        }
        if ($saved) {
            return redirect()->back()->with('success', 'Online Consultation Time Added Successfully');
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OnlineConsultation  $onlineConsultation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $onlineConsultation = OnlineConsultationMeeting::select('id','start_time','agenda','member_id','end_time','doctor_id','history','examination','treatment','progress')->with('member.user:id,name','doctor.user:id,name')->findOrFail($id);
        return view('admin.onlineconsultation.show',compact('onlineConsultation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OnlineConsultation  $onlineConsultation
     * @return \Illuminate\Http\Response
     */
    public function edit(OnlineConsultation $onlineConsultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OnlineConsultation  $onlineConsultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OnlineConsultation $onlineConsultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OnlineConsultation  $onlineConsultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(OnlineConsultation $onlineConsultation)
    {
        //
    }

    public function completed(Request $request, $id){
        $completed = OnlineConsultationMeeting::findOrFail($id);
        $completed->end_time = Carbon::now();
        $doctor = Employee::where('employee_id',auth()->user()->id)->first();
        $completed->doctor_id = $doctor->id;
        $completed->history = $request->history;
        $completed->examination = $request->examination;
        $completed->treatment = $request->treatment;
        $completed->progress = $request->progress;
        $completed->status = 1;
        $completed->save();
        $member = Member::findOrFail($completed->member_id);
        if($member->member_type == 'Dependent Member'){
            $family = Family::where('member_id',$member->id)->where('approved',1)->where('payment_status',1)->first();
            if($family->online_consultation == 0){
                $family->online_consultation = 0;
            }else{
                $family->online_consultation = $family->online_consultation - 1;
            }
            $family->save();
        }elseif($member->member_type == 'Primary Member'){
            $familyname = FamilyName::where('primary_member_id', $member->id)->first();
            if($familyname->online_consultation == 0){
                $familyname->online_consultation = 0;
            }else{
                $familyname->online_consultation = $familyname->online_consultation - 1;
            }
            $familyname->save();
        }
        return redirect()->back()->with('success', 'Meeting Completed Successfully');
    }
}
