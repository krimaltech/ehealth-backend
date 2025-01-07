<?php

namespace App\Http\Controllers;

use App\Models\ActivateStudent;
use Illuminate\Http\Request;

class ActivateStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activate = ActivateStudent::orderBY('created_at','desc')->with(['profile','deactivate.user'])->get();
        return view('admin.activate.index',compact('activate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activate = ActivateStudent::with('profile')->find($request->activate);       
        $activate->status = 1;
        $activate->update();
        return redirect()->back()->with('success','Student Activation Request Approved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeactivateStudent  $deactivateStudent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activate = ActivateStudent::with(['profile','user.member.school'])->find($id);
        return view('admin.activate.show',compact('activate'));
    }

    public function reject(Request $request,$id){
        $request->validate([
            'reject_reason' => 'required',
        ]);
        $activate = ActivateStudent::find($id);
        $activate->status = 2;
        $activate->reject_reason = $request->reject_reason;
        $updated = $activate->update();
        if($updated){
            return redirect()->back()->with('success','Student Activation Request Rejected.');
        }
    }
}
