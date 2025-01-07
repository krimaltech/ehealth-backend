<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Models\DailyWaterIntake;
use App\Models\Member;
use App\Models\WaterIntake;
use App\Models\WaterIntakeInterval;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class WaterIntakeApiController extends Controller
{
    public function index(){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $intake = WaterIntake::where('member_id',$member->id)->with('days')->get();
        return response()->json($intake);
    }

    public function store(Request $request){
        try{
            $request->validate([
                'water_intake' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'interval' => 'required',
                'interval_unit' => 'required',
            ]);
            $member = Member::where('member_id',Auth::user()->id)->first();
            $intake = WaterIntake::where('member_id',$member->id)->first();
            if($intake == null){
                $intake = new WaterIntake();
                $intake->member_id = $member->id;
                $intake->water_intake = $request->water_intake;
                $intake->start_time = $request->start_time;
                $intake->end_time = $request->end_time;
                $intake->interval = $request->interval;
                $intake->interval_unit = $request->interval_unit;
                $intake->week = 1;
                $intake->notification_status = $request->notification_status;
                $saved = $intake->save();
                if($saved){
                    $start_time = Carbon::createFromFormat('H:i', $intake->start_time);
                    $end_time = Carbon::createFromFormat('H:i', $intake->end_time);
                    if($intake->interval_unit  == 'hours'){
                        $interval = intval($intake->interval) * 60 + floor(($intake->interval - intval($intake->interval)) * 60); //convert hour to minute
                    }else{
                        $interval = $intake->interval; // if interval unit in minutes
                    }
                    $current_time = $start_time->copy();
                    $waterInterval = new WaterIntakeInterval();
                    $waterInterval->intake_id = $intake->id;
                    $waterInterval->time = $current_time;
                    $waterInterval->save();
                    while ($current_time <= $end_time) {
                        $waterInterval = new WaterIntakeInterval();
                        $waterInterval->intake_id = $intake->id;
                        $waterInterval->time = $current_time->addMinutes($interval);
                        $waterInterval->save();
                    }
                    $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                    for($i = 0; $i <  7 ; $i++){
                        $dailyintake = new DailyWaterIntake();
                        $dailyintake->intake_id = $intake->id;
                        $dailyintake->day = $days[$i];
                        $dailyintake->intake = 0;
                        $dailyintake->last_week_intake = 0;
                        $dailyintake->save();
                    }
                    return response()->json(['success' => 'Water Intake Details Added.']);
                }
            }
            else{
                return response()->json(['message' => 'Water Intake Details Already Added.'],409);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }     
    }

    public function update(Request $request, $id){
        try{
            $request->validate([
                'water_intake' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'interval' => 'required',
                'interval_unit' => 'required',
            ]);
            $member = Member::where('member_id',Auth::user()->id)->first();
            $intake = WaterIntake::find($id);
            $newIntake = $intake->replicate();
            $intake->member_id = $member->id;
            $intake->water_intake = $request->water_intake;
            $intake->start_time = Carbon::parse($request->start_time)->format('H:i:s');;
            $intake->end_time = Carbon::parse($request->end_time)->format('H:i:s');;
            $intake->interval = $request->interval;
            $intake->interval_unit = $request->interval_unit;
            $updated = $intake->update();
            if($intake->start_time != $newIntake->start_time || $intake->end_time != $newIntake->end_time || $intake->interval != $newIntake->interval || $intake->interval_unit != $newIntake->interval_unit){
                $intervals = WaterIntakeInterval::where('intake_id',$id)->get();
                foreach($intervals as $interval){
                    $interval->delete();
                }
                $start_time = Carbon::createFromFormat('H:i:s', $intake->start_time);
                $end_time = Carbon::createFromFormat('H:i:s', $intake->end_time);
                if($intake->interval_unit  == 'hours'){
                    $interval = intval($intake->interval) * 60 + floor(($intake->interval - intval($intake->interval)) * 60); //convert hour to minute
                }else{
                    $interval = $intake->interval; // if interval unit in minutes
                }
                $current_time = $start_time->copy();
                $waterInterval = new WaterIntakeInterval();
                $waterInterval->intake_id = $intake->id;
                $waterInterval->time = $current_time;
                $waterInterval->save();
                while ($current_time <= $end_time) {
                    $waterInterval = new WaterIntakeInterval();
                    $waterInterval->intake_id = $intake->id;
                    $waterInterval->time = $current_time->addMinutes($interval);
                    $waterInterval->save();
                }
            } 
            if($updated){
                return response()->json(['success' => 'Water Intake Details Updated.']);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }  
    }

    public function updateIntake(Request $request,$id){
        $intake = DailyWaterIntake::find($id);
        $intake->intake = $request->intake;
        $updated = $intake->update();
        if($updated){
            return response()->json(['success' => 'Water Intake Updated.']);
        }
    }

    public function updateNotification(Request $request){
        try{
            $request->validate([
                'notification_status' => 'required'
            ]);
            $member = Member::where('member_id',Auth::user()->id)->first();
            $intake = WaterIntake::where('member_id',$member->id)->first();
            $intake->notification_status = $request->notification_status;
            $updated = $intake->update();
            if($updated){
                return response()->json(['success' => 'Notification Status Updated.']);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }     
    }
}
