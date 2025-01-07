<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\BookLabtest;
use App\Models\LabDepartment;
use App\Models\LabProfile;
use App\Models\LabTest;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabTestApiController extends Controller
{
    public function department(){
        $departments = LabDepartment::all();        
        return response()->json($departments);
    }

    public function tests($id){
        $profiles = LabProfile::where('department_id',$id)->with('labtest')->get();
        $tests = LabTest::where('department_id',$id)->with(['labdepartment','labprofile'])->get();
        return response()->json(['labprofiles' => $profiles , 'labtests' => $tests ]);
    }

    public function labTest(Request $request){
        if($request->id){
            $member = Member::where('member_id',Auth::user()->id)->first();  
            $booking = BookLabtest::find($request->id);
            if($booking->labprofile_id != null){
                $bookings = BookLabtest::with(['lab.user','lab.subrole','labprofile.labdepartment','labprofile.labtest.labdepartment','labtest.labdepartment','labtest.labprofile','reports.labvalue','reports.labtest.labdepartment'])->find($request->id);
            }else{
                $bookings = BookLabtest::with(['lab.user','lab.subrole','labprofile.labdepartment','labprofile.labtest.labdepartment','labtest.labdepartment','labtest.labprofile','reports.labvalue','reports.labtest.labdepartment'])->find($request->id);
            }
        }else{
            $member = Member::where('member_id',Auth::user()->id)->first();
            $bookings = BookLabtest::where('member_id',$member->id)->with(['lab.user','lab.subrole','labprofile.labdepartment','labprofile.labtest.labdepartment','labtest.labdepartment','labtest.labprofile','reports.labvalue','reports.labtest.labdepartment'])->get();
        }
        return response()->json($bookings);
    }

    public function bookLabtest(Request $request){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $lab = new BookLabtest();
        $lab->member_id = $member->id;
        $lab->labprofile_id = $request->labprofile_id;
        $lab->labtest_id = $request->labtest_id;
        $lab->date = $request->date;
        $lab->time = Carbon::createFromFormat('H:i',$request->time)->format('g:i A');
        $lab->status = 0;
        $lab->booking_status = 'Not Scheduled';
        $lab->price = $request->price;
        $saved = $lab->save();
        if($saved){
            return response()->json($lab);
        }
    }

    public function payment(Request $request)
    {   
        if($request->token){
            //payment verification (app)
            $khaltiVerify = Helper::khaltiVerify($request);
            if (isset($khaltiVerify['idx'])) {
                $booking = BookLabtest::find($request->input('id'));
                $booking->status = 1;
                $booking->booking_status = 'Scheduled';
                $booking->payment_method = 'Khalti';
                $booking->payment_date = Carbon::now();
                $booking->update();
                return response()->json([ 
                    'success' => 'Lab Booking Payment Completed.',
                ]);
            } else {
                return response()->json([
                    'error' => 'Something went Wrong.',
                ]);
            }
        }else{
            //payment verification (web)
            $khaltiLookup = Helper::khaltiLookup($request->pidx);
            $responseData = $khaltiLookup->getData();
            if(isset($responseData->status) && $responseData->status === 'Completed'){
                $booking = BookLabtest::find($request->input('id'));
                $booking->status = 1;
                $booking->booking_status = 'Scheduled';
                $booking->payment_method = 'Khalti';
                $booking->payment_date = Carbon::now();
                $booking->update();
                return response()->json([ 
                    'success' => 'Lab Booking Payment Completed.',
                ]);
            } else {
                return response()->json([
                    'error' => 'Payment Pending.',
                ],400);
            }
        }
    }
}
