<?php

namespace App\Http\Controllers;

use App\Models\BookingNotification;
use App\Models\RequestScreening;
use App\Models\ScreeningDate;
use App\Models\StoreToken;
use Illuminate\Http\Request;

class RequestScreeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reschedule = RequestScreening::with(['screeningdate.screening','userpackage.package','userpackage.familyname.primary'])->get();
        return view('admin.rescheduleRequest.index',compact('reschedule'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestScreening  $requestScreening
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reschedule = RequestScreening::with(['screeningdate.screening','userpackage.package','userpackage.familyname.primary.user'])->find($id);
        return view('admin.rescheduleRequest.show',compact('reschedule'));
    }

    public function approve($id){
        $reschedule = RequestScreening::find($id);
        $reschedule->status = 1;
        $updated = $reschedule->update();
        if($updated){
            $screeningDate = ScreeningDate::with('userpackage.familyname.primary')->find($reschedule->screeningdate_id);
            $screeningDate->doctorvisit_date = $reschedule->date;
            $screeningDate->doctorvisit_time = $reschedule->time;
            $screeningDate->update();
        }
        $user = StoreToken::where('user_id', $screeningDate->userpackage->familyname->primary->member_id)->first();
        if($user){
            $notification_id = $user->device_key;
            $title = "Reschedule Notification ";
            $message = "Your home visit date has been rescheduled";
            $type = "Reschedule";
            send_notification_FCM($notification_id, $title, $message, $type);

            $screeningNotification = new BookingNotification();
            $screeningNotification->user_id = $screeningDate->userpackage->familyname->primary->member_id;
            $screeningNotification->image = $screeningDate->userpackage->familyname->primary->image_path;
            $screeningNotification->title = "Reschedule Notification";
            $screeningNotification->body = $message;
            $screeningNotification->type = "Reschedule";
            $screeningNotification->save();

        }
        return redirect()->back()->with('success','Schedule Reschedule Change Request Approved.');
    }
}
