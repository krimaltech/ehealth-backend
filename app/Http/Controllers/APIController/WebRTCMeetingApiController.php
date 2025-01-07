<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\WebRTCMeetingController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WebRTCMeetingApiController extends Controller
{
    public function createMeeting(Request $request) {
        $METERED_DOMAIN = env('METERED_DOMAIN');
        $METERED_SECRET_KEY = env('METERED_SECRET_KEY');
        
        Log::info("https://{$METERED_DOMAIN}/api/v1/room?secretKey={$METERED_SECRET_KEY}");
        $room_name = strtolower($request->room_name);
        $meeting = new WebRTCMeetingController();
        $meeting->start_time = Carbon::now();
        $meeting->url = 'https://ghargharmadoctor.metered.live/'. str_replace(" ", "-", $room_name);
        $meeting->save();

        // Contain the logic to create a new meeting
        $response = Http::post("https://{$METERED_DOMAIN}/api/v1/room?secretKey={$METERED_SECRET_KEY}", [
            'autoJoin' => true,
            'roomName' => $request->room_name,
        ]);

        return $response->json([
            'status' => true
        ]);
    }

    public function getAllMeeting()
    {
        $meeting = Http::post('https://ghargharmadoctor.metered.live/api/v1/rooms?secretKey=m6Q5DQgq4tBxf-y_Duipm1p33EXO3ntuQF5XDMHA9LBC59Gt');
        return response()->json($meeting);
    }
}
