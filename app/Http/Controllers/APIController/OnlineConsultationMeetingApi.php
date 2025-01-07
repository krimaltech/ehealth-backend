<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\Member;
use App\Models\OnlineConsultationMeeting;
use App\Traits\ZoomJWT;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OnlineConsultationMeetingApi extends Controller
{
    use ZoomJWT;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function list(Request $request)
    {
        $meeting = Meeting::all();
        return view('admin.mettings.index', compact('meeting'));
    }
    public function details()
    {
        return view('admin.mettings.write');
    }
    public function create(Request $request)
    {
        $path = 'users/me/meetings';
        $response = $this->zoomPost($path, [
            'topic' => 'Online Consultation',
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $this->toZoomTimeFormat(Carbon::now()),
            'duration' => 30,
            'agenda' => 'Online Health Checkup',
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ],
        ]);
        $meeting = new OnlineConsultationMeeting();
        $member = Member::where('member_id',auth()->user()->id)->first();
        $meeting->member_id = $member->id;
        $meeting->topic = 'Online Consultation';
        $meeting->start_time = Carbon::now();
        $meeting->agenda = 'Online Health Checkup';
        $meeting->meeting_id = $response['id'];
        $meeting->meeting_password = $response['encrypted_password'];
        $meeting->join_url = $response['join_url'];
        $meeting->start_url = $response['start_url'];
        $meeting->status = 0;
        $saved = $meeting->save();
        if ($saved) {
            return response()->json([
                'meeting_url' => $meeting->start_url,
                'meeting_id' => $meeting->meeting_id,
                'meeting_password' => $meeting->meeting_password,
            ]);
        }
        // if ($saved) {
        //     return redirect()->route('mettings.index')->with('success', 'Meeting Created Successfully');
        // }
    }

    public function toZoomTimeFormat(string $dateTime)
    {
        try {
            $date = new \DateTime($dateTime);
            return $date->format('Y-m-d\TH:i:s');
        } catch (\Exception $e) {
            Log::error('ZoomJWT->toZoomTimeFormat : ' . $e->getMessage());
            return '';
        }
    }

    public function toUnixTimeStamp(string $dateTime, string $timezone)
    {
        try {
            $date = new \DateTime($dateTime, new \DateTimeZone($timezone));
            return $date->getTimestamp();
        } catch (\Exception $e) {
            Log::error('ZoomJWT->toUnixTimeStamp : ' . $e->getMessage());
            return '';
        }
    }

    public function meeting_history(Request $request)
    {
        $member = Member::where('member_id',auth()->user()->id)->first();
        if ($request->id) {
            $onlineConsultation = OnlineConsultationMeeting::select('id','start_time','agenda','member_id','end_time','doctor_id','history','examination','treatment','progress')->with('member.user:id,name','doctor.user:id,name')->where('member_id',$member->id)->where('id',$request->id)->first();
        } else {
            $onlineConsultation = OnlineConsultationMeeting::select('id','start_time','agenda','member_id','end_time','doctor_id','history','examination','treatment','progress')->with('member.user:id,name','doctor.user:id,name')->where('member_id',$member->id)->get();
        }
        
        return response()->json($onlineConsultation);
    }
}
