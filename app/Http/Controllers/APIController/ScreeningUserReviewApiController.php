<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\ScreeningUserReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScreeningUserReviewApiController extends Controller
{
    public function review(Request $request){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $review = new ScreeningUserReview();
        $review->member_id = $member->id;
        $review->employee_id  = $request->employee_id;
        $review->screeningdate_id = $request->screeningdate_id;
        $review->comment = $request->comment;
        $saved = $review->save();
        if($saved){
            return response()->json(['success' => 'Feedback Added Successfully.']);
        }

    }
}
