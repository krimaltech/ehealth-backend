<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Models\AppAnalytics;
use App\Models\AppOpenCount;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitorApiController extends Controller
{
    public function visitor(Request $request){
        $ip = $request->ip();
        if($ip != null){
            $existingVisitor = Visitor::where('ip_address', $ip)->first();
            if($existingVisitor != null){
                $visitor = new Visitor();
                $visitor->ip_address = $ip;
                $visitor->visit_status = 1;
                $visitor->location = $request->location;
                $visitor->save();
            }else{
                $visitor = new Visitor();
                $visitor->ip_address = $ip;
                $visitor->visit_status = 0;
                $visitor->location = $request->location;
                $visitor->save();
            }
            return response()->json(['message' => 'Visitor logged.']);
        }else{
            return response()->json(['message' => 'Visitor Not logged.'],400);
        }

    }

    public function index(){
        $analytics = AppAnalytics::all();
        return response()->json($analytics);
    }

    public function store(Request $request){
        $analytics = AppAnalytics::where('fcm_token',$request->fcm_token)->first();
        if($analytics != null){
            $openCount = AppOpenCount::where('app_id',$analytics->id)->whereDate('created_at',Carbon::now())->where('status', 0)->first();
            if($openCount != null){
                $openCount->count++;
                $openCount->update();
            }else{
                $newOpenCount = new AppOpenCount();
                $newOpenCount->app_id = $analytics->id;
                $newOpenCount->count = 1;
                $newOpenCount->save();
            }
        }else{
            $newAnalytics = new AppAnalytics();
            $newAnalytics->fcm_token = $request->fcm_token;
            $newAnalytics->platform = $request->platform;
            $newAnalytics->save();

            $newInstall = new AppOpenCount();
            $newInstall->app_id = $newAnalytics->id;
            $newInstall->count = 1;
            $newInstall->status = 1;
            $newInstall->save();
        }
        return response()->json(['success' => 'true']);
    }
}
