<?php

namespace App\Http\Controllers;

use App\Models\ReportSubject;
use Illuminate\Http\Request;

class ReportSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = ReportSubject::all();
        return view('admin.reportproblem.subject.index',compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
        ]);
        $subject = new ReportSubject();
        $subject->subject = $request->subject;
        $saved = $subject->save();
        if($saved){
            return redirect()->route('reportsubject.index')->with('success','Report Subject Added Successfully.');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportSubject  $reportSubject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $request->validate([
            'subject' => 'required',
        ]);
        $subject = ReportSubject::find($id);
        $subject->subject = $request->subject;
        $updated = $subject->update();
        if($updated){
            return redirect()->route('reportsubject.index')->with('success','Report Subject Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportSubject  $reportSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = ReportSubject::find($id);
        $deleted = $subject->delete();
        if($deleted){
            return redirect()->route('reportsubject.index')->with('success','Report Subject Deleted Successfully.');
        }
    }
}
