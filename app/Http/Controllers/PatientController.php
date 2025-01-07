<?php

namespace App\Http\Controllers;

use App\Models\BookingReview;
use App\Models\BookService;
use App\Models\Doctor;
use App\Models\Family;
use App\Models\MedicalReport;
use App\Models\Member;
use App\Models\ScreeningReport;
use App\Models\Service;
use App\Models\ServiceReport;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PatientController extends Controller
{
    public function index(){
        if (Gate::allows('Doctor')) {
            $doctor = Doctor::where('doctor_id',Auth::user()->id)->first()->id;
            $patient = BookingReview::where('doctor_id',$doctor)->where('status',1)->with('member.user','slot.bookings')->get()->groupBy('user_id');
            $user = [];
            foreach($patient as $key=>$value){
                $user[] = Member::with('user')->find($key);
            }
            return view('admin.patient.index',compact('user'));
        } else {
            return view('viewnotfound');
        }
    }

    public function show($id){
        if (Gate::allows('Doctor')) {
            $doctor = Doctor::where('doctor_id',Auth::user()->id)->first()->id;
            $member = Member::with('user')->find($id);
            $report = ScreeningReport::with('reportdetail')->whereHas('reportdetail',function($query) use($id){
                $query->where('member_id',$id);
            })->get();
            $services = Service::all();
            $single_report = BookService::where('member_id',$id)->where('booking_status','Completed')->with('labreports.test')->get()->groupBy('service_id');
            return view('admin.patient.show',compact('member','report','services','single_report'));

            // $report = MedicalReport::where('member_id',$user->id)->with(['service','test'])->get()->groupBy(['service_id','screening_id',function($date){ return $date->created_at->format('Y-m-d'); }]);
            // $single_report = ServiceReport::with(['book','test'])->whereHas('book',function($query) use($id){
            //     $query->where('member_id',$id);
            // })->get()->groupBy(['book.service_id',function($date){ return $date->created_at->format('Y-m-d'); }]);
            //return $single_report;
        } else {
            return view('viewnotfound');
        }
    }
}
