<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use App\Models\NurseShift;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NurseShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nurse = Nurse::where('nurse_id',Auth::user()->id)->first()->id;
        $shift = NurseShift::where('nurse_id',$nurse)->get();
        return view('admin.nurseshift.index',compact('nurse','shift'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nurse = Nurse::where('nurse_id',Auth::user()->id)->first();
        $nurseShift = NurseShift::where('date',$request->date)->where('nurse_id',$nurse->id)->first();
        if($nurseShift != null){
            $request->validate([
                'shift' => 'required'
            ]);
            $shift = NurseShift::find($nurseShift->id);
            $shift->nurse_id = $request->nurse_id;
            $shift->shift = $request->shift;
            $saved = $shift->save();
            if($saved){
                return redirect()->route('nurseshift.index')->with('success','Shift Added Successfully');
            }
        }
        else{
            $request->validate([
                'shift' => 'required'
            ]);
            $shift = new NurseShift();
            $shift->nurse_id = $request->nurse_id;
            $shift->date = $request->date;
            $shift->shift = $request->shift;
            $saved = $shift->save();
            if($saved){
                return redirect()->route('nurseshift.index')->with('success','Shift Added Successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NurseShift  $nurseShift
     * @return \Illuminate\Http\Response
     */
    public function show(NurseShift $nurseShift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NurseShift  $nurseShift
     * @return \Illuminate\Http\Response
     */
    public function edit(NurseShift $nurseShift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NurseShift  $nurseShift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NurseShift $nurseShift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NurseShift  $nurseShift
     * @return \Illuminate\Http\Response
     */
    public function destroy(NurseShift $nurseShift)
    {
        //
    }
}
