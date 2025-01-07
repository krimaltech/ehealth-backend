<?php

namespace App\Http\Controllers;

use App\Models\BookingNotification;
use App\Models\DoctorScreeningAdvice;
use App\Models\Employee;
use App\Models\MedicalReport;
use App\Models\Member;
use App\Models\OnlineDoctorConsultation;
use App\Models\PackageScreeningTeam;
use App\Models\ScreeningDate;
use App\Models\StoreToken;
use Illuminate\Http\Request;
use App\Traits\ZoomJWT;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OnlineDoctorConsultationController extends Controller
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
        $report = MedicalReport::where('status','Doctor Visit')->whereHas('homeskip')->with(['homeskip','members.user','screeningdate.userpackage','online'])->get();
        return view('admin.onlineDoctorConsultation.index',compact('report'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //return $request
        $request->validate([
            'doctor_id' => 'required',
            'online_date' => 'required',
        ]);

        $path = 'users/me/meetings';
        $response = $this->zoomPost($path, [
            'topic' =>'Online Doctor Consultation',
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $this->toZoomTimeFormat($request->online_date),
            'duration' => 30,
            'timezone' => 'Asia/Kathmandu', 
            'agenda' => 'Online Doctor Consultation',
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ],
        ]);
        
        $meeting = new OnlineDoctorConsultation();
        $meeting->medicalreport_id = $id;
        $meeting->member_id = $request->member;
        $meeting->start_time = Carbon::parse($request->online_date)->format('Y-m-d g:i A');
        $meeting->doctor_id = $request->doctor_id;
        $meeting->join_url = $response['join_url'];
        $meeting->start_url = $response['start_url'];
        $meeting->meeting_id = $response['id'];
        $meeting->meeting_password = $response['encrypted_password'];
        $saved = $meeting->save();

        $packageScreeningTeam = new PackageScreeningTeam();
        $report = MedicalReport::find($id);
        $packageScreeningTeam->screeningdate_id = $report->screeningdate_id;
        $packageScreeningTeam->employee_id = $request->doctor_id;
        $packageScreeningTeam->type = 'Doctor';
        $packageScreeningTeam->online_status = 1;
        $packageScreeningTeam->save();

        //meeting notification
        $title = "Meeting Notification ";
        $message = "Your doctor consultation meeting has been scheduled.";
        $type = "Online Consultation";
        $member = Member::find($request->member);
        $doctorMember = Employee::find($request->doctor_id);
        $users = StoreToken::whereIn('user_id', [$member->member_id,$doctorMember->employee_id])->get();
        $notification_ids = $users->pluck('device_key');
        $sent = send_bulk_notification_FCM($notification_ids, $title, $message, $type);
        if($sent){           
            $screeningNotification = new BookingNotification();
            $screeningNotification->user_id = $member->member_id;
            $screeningNotification->image = $member->image_path;
            $screeningNotification->title = "Meeting Notification";
            $screeningNotification->body = $message;
            $screeningNotification->type = "Online Consultation";
            $screeningNotification->save();

            $screeningNotification = new BookingNotification();
            $screeningNotification->user_id = $doctorMember->employee_id;
            $screeningNotification->image = $doctorMember->image_path;
            $screeningNotification->title = "Meeting Notification";
            $screeningNotification->body = $message;
            $screeningNotification->type = "Online Consultation";
            $screeningNotification->save();
        }
        if ($saved) {
            return redirect()->back()->with('success', 'Doctor Consultation Meeting Scheduled Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OnlineDoctorConsultation  $onlineDoctorConsultation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = MedicalReport::with(['homeskip','members.user','screeningdate.userpackage','online.doctor'])->find($id);
        return view('admin.onlineDoctorConsultation.show',compact('report'));
    }

    public function employee(Request $request){
        $screening = ScreeningDate::where('doctorvisit_date', Carbon::parse($request->date)->format('Y-m-d'))->where('status', 'Doctor Visit')->with(['employees'=>function($query){
            $query->whereNotIn('type',['Lab Nurse','Lab Technician']);
        }])->get();
        $emp = [];
        if (count($screening) != 0) {
            foreach ($screening as $item) {
                foreach ($item->employees as $employee) {
                    if (!in_array($employee->employee_id, $emp)) {
                        $emp[] = $employee->employee_id;
                    }
                }
            }
        }
        $online = OnlineDoctorConsultation::where('status',0)->where('start_time', '!=' , Carbon::parse($request->online_date)->format('Y-m-d g:i A'))->get();

        foreach($online as $item){
            $date = \Carbon\Carbon::parse($item->start_time);  
            $modifiedDate = $date->addMinutes(30);
            $checkDate = \Carbon\Carbon::parse($request->date);
            $isBetween = $checkDate->between($date, $modifiedDate);
            if ($isBetween) {
                array_push($emp,$item->doctor_id);
            }
        }

        $employees = array_unique($emp);
        $doctor = Employee::whereNotIn('id', $employees)->with(['user', 'departments', 'subrole'])->where('sub_role_id', 6)->where('department', 1)->get();
        return response()->json($doctor);
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

    public function findingsIndex(){
        $doctor = Employee::where('employee_id',Auth::user()->id)->first();
        $consultation = OnlineDoctorConsultation::where('doctor_id',$doctor->id)->with(['report.screeningdate.userpackage','member.user'])->get();
        return view('admin.onlineDoctorConsultation.findings.index',compact('consultation'));
    }

    public function findingsStore(Request $request,$id){
        $request->validate([
            'feedback' => 'required',
        ]);
        $employee = Employee::where('employee_id',Auth::user()->id)->first();
        $report = MedicalReport::find($request->report_id);
        $team = PackageScreeningTeam::where('screeningdate_id',$report->screeningdate_id)->where('employee_id',$employee->id)->where('online_status',1)->first();
        $advice = new DoctorScreeningAdvice();
        $advice->package_screening_teams_id = $team->id;
        $advice->report_id = $request->report_id;
        $advice->feedback = $request->feedback;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('file')) {
                $images = storeImageLaravel($request, 'file', 'file_path');
                $advice->file = $images[0];
                $advice->file_path = $images[1];
            }
        } else {
            if ($request->hasFile('file')) {
                $images = storeImageStorage($request, 'file', 'file_path');
                $advice->file = $images[0];
                $advice->file_path = $images[1];
            }
        }
        $advice->save();

        $consultation = OnlineDoctorConsultation::find($id);
        $consultation->status = 1;
        $consultation->update();

        $report->status = 'Consultation Report';
        $report->consultation_report_date = Carbon::now();
        $report->update();

        //if user lab visit was skipped
        $skipReport = MedicalReport::where('screeningdate_id',$report->screeningdate_id)->where('sample_date',null)->where('status','Doctor Visit')->get();
        foreach($skipReport as $skip){
            $skip->status = 'Consultation Skipped';
            $skip->update();
        }

        $totalreport = MedicalReport::where('screeningdate_id',$report->screeningdate_id)->count();
        $completedcount = MedicalReport::where('screeningdate_id',$report->screeningdate_id)->whereIn('status',['Consultation Report','Consultation Skipped'])->count();
        if($totalreport == $completedcount){
            $screening = ScreeningDate::find($report->screeningdate_id);
            $screening->status = 'Doctor Visit Completed';
            $screening->doctorreport_date = Carbon::now();
            $screening->update();
        }

        
        return redirect()->back()->with('success', 'Report Findings Added Successfully');
    }

    public function unavailable(Request $request, $id){
        $request->validate([
            'reason' => 'required',
        ]);
        $consultation = OnlineDoctorConsultation::find($id);
        $consultation->reason = $request->reason;
        $consultation->status = 1;
        $consultation->update();

        $report = MedicalReport::find($request->report_id);
        $report->status = 'Consultation Skipped';
        $report->update();

        $skipReport = MedicalReport::where('screeningdate_id',$report->screeningdate_id)->where('sample_date',null)->where('status','Doctor Visit')->get();
        foreach($skipReport as $skip){
            $skip->status = 'Consultation Skipped';
            $skip->update();
        }

        $totalreport = MedicalReport::where('screeningdate_id',$report->screeningdate_id)->count();
        $completedcount = MedicalReport::where('screeningdate_id',$report->screeningdate_id)->whereIn('status',['Consultation Report','Consultation Skipped'])->count();
        if($totalreport == $completedcount){
            $screening = ScreeningDate::find($report->screeningdate_id);
            $screening->status = 'Doctor Visit Completed';
            $screening->doctorreport_date = Carbon::now();
            $screening->update();
        }
        return redirect()->back()->with('success', 'Member Unavailable Reason Added Successfully');
    }

    public function findingsShow($id){
        $report = MedicalReport::with(['advice','online.doctor.user'])->find($id);
        return view('admin.onlineDoctorConsultation.findings.show',compact('report'));
    }
}
