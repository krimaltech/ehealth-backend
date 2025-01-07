<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\DailyStepCount;
use App\Models\Member;
use App\Models\StepCount;
use App\Models\UpdatedMedicalHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StepCountApiController extends Controller
{
    public function index(){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $stepCount = StepCount::where('member_id',$member->id)->with('step')->get();
        return response()->json($stepCount);
    }

    
    public function updateSteps(Request $request)
    {
        $member = Member::where('member_id', Auth::user()->id)->first();
        $member->steps_count = $request->steps_count;
        $updated = $member->update();
        $medical = new UpdatedMedicalHistory();
        $medical->member_id = $member->member_id;
        $medical->steps_count = $request->steps_count;
        $medical->save();

        $stepCount = StepCount::where('member_id',$member->id)->latest()->first();
        if($stepCount == null){
            $count = new StepCount();
            $count->member_id = $member->id;
            $count->week = 1;
            $count->total_step_count = $request->steps_count;
            $count->total_credit = $request->credit;
            $saved = $count->save();
            if($saved){
                $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                $day = Carbon::now()->format('l');
                for($i = 0; $i <  7 ; $i++){
                    $step = new DailyStepCount();
                    $step->stepcount_id = $count->id;
                    $step->day = $days[$i];
                    if($days[$i] == $day){
                        $step->step_count = $request->steps_count;
                        $step->credit = $request->credit;
                    }else{
                        $step->step_count = 0;    
                    }
                    $step->save();
                }
                if($day == 'Saturday'){
                    $newcount = new StepCount();
                    $newcount->member_id = $member->id;
                    $newcount->week = $count->week + 1;
                    $newcount->total_step_count = 0;
                    $newcount->total_credit = 0;
                    $saved = $newcount->save();
                    if($saved){
                        $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                        for($i = 0; $i <  7 ; $i++){
                            $day = Carbon::now()->format('l');
                            $step = new DailyStepCount();
                            $step->stepcount_id = $newcount->id;
                            $step->day = $days[$i];
                            $step->step_count = 0;    
                            $step->save();
                        }    
                    }
                }
            }
        }else{
            $stepCount->total_step_count += $request->steps_count;
            $stepCount->total_credit += $request->credit;
            $stepCount->update();
            $day = Carbon::now()->format('l');
            $daily = DailyStepCount::where('stepcount_id',$stepCount->id)->where('day',$day)->first();
            if($daily == null){
                $step = new DailyStepCount();
                $step->stepcount_id = $stepCount->id;
                $step->day = $day;
                $step->step_count = $request->steps_count;
                $step->credit = $request->credit;
                $step->save();
            }else{
                $daily->step_count = $request->steps_count;
                $daily->credit = $request->credit;
                $daily->update();
            }
            if($day == 'Saturday'){
                $newcount = new StepCount();
                $newcount->member_id = $member->id;
                $newcount->week = $stepCount->week + 1;
                $newcount->total_step_count = 0;
                $newcount->total_credit = 0;
                $saved = $newcount->save();
                if($saved){
                    $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                    for($i = 0; $i <  7 ; $i++){
                        $day = Carbon::now()->format('l');
                        $step = new DailyStepCount();
                        $step->stepcount_id = $newcount->id;
                        $step->day = $days[$i];
                        $step->step_count = 0;    
                        $step->save();
                    }    
                }
            }
        }
        if ($updated) {
            return response()->json(['message' => 'Steps Count Updated']);
        }
    }
}
