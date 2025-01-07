<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorReview;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorReviewController extends Controller
{
    public function getDoctorReview(Request $request)
    {
        $doctor_id = $request->doctor_id;
        $review = DoctorReview::with('member.user')->where('doctor_id', $doctor_id)->get();
        return response()->json($review);
    }
    public function doctorReview(Request $request)
    {
        $review = new DoctorReview();
        $id = auth()->user()->id;
        $user_id = Member::where('member_id', $id)->first()->id;
        $review->user_id = $user_id;
        $review->doctor_id = $request->doctor_id;
        $review->appointment_id = $request->appointment_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->status = 0;
        $review->save();
        //? updating user rating and review of doctor
        $doctor = Doctor::find($request->doctor_id);
        $rating_review = DoctorReview::groupBy('doctor_id')->select(DB::raw('AVG(rating) as ratings'))->where('doctor_id', $request->doctor_id)->first();
        $doctor->averageRating = $rating_review->ratings;
        $rating_review = DoctorReview::groupBy('doctor_id')->select(DB::raw('COUNT(rating) as count'))->where('doctor_id', $request->doctor_id)->first();
        $doctor->averageReview = $rating_review->count;
        $doctor->update();
        return response()->json(['message' => 'success']);
    }
    public function countDepartment(Request $request)
    {
        $department = $request->department;
        $doctorcount = Doctor::groupBy('department')->select(DB::raw('COUNT(doctor_id) as count'))->where('department', $department)->first();
        return $doctorcount;
    }
}