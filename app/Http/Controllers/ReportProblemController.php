<?php

namespace App\Http\Controllers;

use App\Models\ReportProblem;
use Illuminate\Http\Request;

class ReportProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problems = ReportProblem::with(['member.user','reportsubject'])->get();
        return view('admin.reportproblem.problems.index',compact('problems'));
    }

    public function show($id){
        $problem = ReportProblem::find($id);
        return view('admin.reportproblem.problems.show',compact('problem'));
    }
}
