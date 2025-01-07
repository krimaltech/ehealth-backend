<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Nurse;
use App\Models\NurseReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NurseReviewApiController extends Controller
{
    public function getNurseReview(Request $request)
    {
        $nurse_id = $request->nurse_id;
        $review = NurseReview::with('member.user')->where('nurse_id', $nurse_id)->get();
        return response()->json($review);
    }
    public function nurseReview(Request $request)
    {
        $review = new NurseReview();
        $id = auth()->user()->id;
        $user_id = Member::where('member_id', $id)->first()->id;
        $review->user_id = $user_id;
        $review->nurse_id = $request->nurse_id;
        $review->appointment_id = $request->appointment_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->status = 0;
        $review->save();
        $doctor = Nurse::find($request->nurse_id);
        $rating_review = NurseReview::groupBy('nurse_id')->select(DB::raw('AVG(rating) as ratings'))->where('nurse_id', $request->nurse_id)->first();
        $doctor->averageRating = $rating_review->ratings;
        $rating_review = NurseReview::groupBy('nurse_id')->select(DB::raw('COUNT(rating) as count'))->where('nurse_id', $request->nurse_id)->first();
        $doctor->averageReview = $rating_review->count;
        $doctor->save();
        return response()->json(['message' => 'success']);
    }
}