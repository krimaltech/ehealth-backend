<?php

namespace App\Http\Controllers;

use App\Models\BookingNotification;
use App\Models\SampleNotCollected;
use App\Models\ScreeningDate;
use App\Models\StoreToken;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SampleNotCollectedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reason = ScreeningDate::whereHas('nosample')->with(['screening','userpackage.package','userpackage.familyname.family','nosample'])->get();
        return view('admin.sampleReason.index',compact('reason'));
    }

    public function secondIndex()
    {
        $reason = ScreeningDate::whereHas('additionalnosample')->with(['screening','userpackage.package','userpackage.familyname.family','additionalnosample'])->get();
        return view('admin.secondSampleReason.index',compact('reason'));
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
            'additional_screening_date' => 'required',
            'additional_screening_time' => 'required',
        ]);
        $screeningdate = ScreeningDate::find($id);
        $screeningdate->additional_screening_status = 0;
        $screeningdate->additional_screening_date = $request->additional_screening_date;
        $screeningdate->additional_screening_time = Carbon::parse($request->additional_screening_time)->format('g:i A');
        $updated = $screeningdate->update();
        $user = StoreToken::where('user_id', $screeningdate->userpackage->familyname->primary->member_id)->first();
        if($user){
            $notification_id = $user->device_key;
            $title = "Lab Reschedule Notification ";
            $message = "Your lab visit date has been rescheduled";
            $type = "Lab Reschedule";
            send_notification_FCM($notification_id, $title, $message, $type);

            $screeningNotification = new BookingNotification();
            $screeningNotification->user_id = $screeningdate->userpackage->familyname->primary->member_id;
            $screeningNotification->image = $screeningdate->userpackage->familyname->primary->image_path;
            $screeningNotification->title = "Lab Reschedule Notification";
            $screeningNotification->body = $message;
            $screeningNotification->type = "Lab Reschedule";
            $screeningNotification->save();

        }
        if($updated){
            return redirect()->back()->with('message','Lab follow up date added successfully.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reason = ScreeningDate::whereHas('nosample')->with(['employees'=>function($query){
            $query->where('type','Lab Technician')->orWhere('type','Lab Nurse');
        },'screening','userpackage.package','userpackage.familyname.family','nosample.medicalreport.members.user','nosample.employee.user'])->find($id);
        //return $reason;
        return view('admin.sampleReason.show',compact('reason'));
    }

    public function secondShow($id)
    {
        $reason = ScreeningDate::whereHas('additionalnosample')->with(['employees'=>function($query){
            $query->where('type','Lab Technician')->orWhere('type','Lab Nurse');
        },'screening','userpackage.package','userpackage.familyname.family','additionalnosample.medicalreport.members.user','additionalnosample.employee.user'])->find($id);
        //return $reason;
        return view('admin.secondSampleReason.show',compact('reason'));
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
