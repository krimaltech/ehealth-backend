<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Models\GdFeedback;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class GdFeedbackApiController extends Controller
{
    public function feedback(Request $request){
        try {
            $request->validate([
                'rating' => 'required',
                'feedback' => 'required',
            ]);
            $feedback = new GdFeedback();
            $member = Member::where('member_id', Auth::user()->id)->first();
            $feedback->member_id = $member->id;
            $feedback->rating = $request->rating;
            $feedback->feedback = $request->feedback;
            $feedback->status = 0;
            $feedback->save();
            return response()->json(['success' => 'true']);
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }    
    }
}
