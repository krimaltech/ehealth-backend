<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ScreeningEmployeeReview;
use App\Models\ScreeningUserReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ScreeningReviewController extends Controller
{
    public function userindex()
    {
        if (Gate::any(checkPermission("28"))) {
            $review = ScreeningUserReview::with(['member.user','employee.user','dates'])->get();
            return view('admin.feedback.user.index',compact('review'));
        } else {
            return view('viewnotfound');
        }
    }

    public function employeeindex()
    {
        if (Gate::any(checkPermission("28"))) {
            $review = ScreeningEmployeeReview::with(['member.user','employee.user','dates'])->get();
            return view('admin.feedback.employee.index',compact('review'));
        } else {
            return view('viewnotfound');
        }
    }

    public function employeeReviewStore(Request $request){
        $request->validate([
            'comment' => 'required',
        ]);
        $employee =  Employee::where('employee_id',Auth::user()->id)->first();
        $review = new ScreeningEmployeeReview();
        $review->member_id = $request->member_id;
        $review->employee_id  = $employee->id;
        $review->screeningdate_id = $request->screeningdate_id;
        $review->comment = $request->comment;
        $saved = $review->save();
        if($saved){
            return redirect()->back()->with('success','Feedback Added Successfully.');
        }
    }
}
