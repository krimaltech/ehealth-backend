<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\ReportProblem;
use App\Models\ReportSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportProblemApiController extends Controller
{
    public function subject(){
        $subject = ReportSubject::all();
        return response()->json($subject);
    }

    public function report(Request $request){
        $problem = new ReportProblem();
        $member = Member::where('member_id', Auth::user()->id)->first();
        $problem->member_id = $member->id;
        $problem->subject_id = $request->subject_id;
        $problem->message = $request->message;
        $problem->save();
        return response()->json(['success' => 'true']);
    }
}
