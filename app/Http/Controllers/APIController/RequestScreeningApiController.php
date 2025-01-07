<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\RequestScreening;
use App\Models\UserPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestScreeningApiController extends Controller
{
    public function change(Request $request){
        $userpackage = UserPackage::with('package')->find($request->userpackage_id);
        //check whether package has schedule flexibility or not
        if($userpackage->package->schedule_flexibility == 1){
            $member = Member::where('member_id',Auth::user()->id)->first();
            //check whether user has already made schedule change request
            $requestScreening = RequestScreening::where('userpackage_id',$request->userpackage_id)->count();
            //check whether it has reached the schedule flexibility limit
            if($requestScreening <= $userpackage->package->schedule_times){
                $screening  = new RequestScreening();
                $screening->member_id = $member->id;
                $screening->userpackage_id = $request->userpackage_id;
                $screening->screeningdate_id = $request->screeningdate_id;
                //check whether the entered date has already passed
                if($request->date >= Carbon::now()->format('Y-m-d')){
                    $screening->date = $request->date;
                }else{
                    return response()->json(['message' => [
                        'error' => ['Please enter a date that is today or in the future']
                    ]],422);
                }
                $screening->time = $request->time;
                $screening->save();
                return response()->json(['success' => 'Schedule change request made successfully.']);
            }else{
                return response()->json(['message' => [
                    'error' => ['You cannot make schedule change request anymore.']
                ]],400);
            }
        }else{
            return response()->json(['message' => [
                'error' => ['No schedule flexibility.']
            ]],400);
        }
    }
}
