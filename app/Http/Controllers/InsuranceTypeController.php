<?php

namespace App\Http\Controllers;

use App\Models\InsuranceType;
use Illuminate\Http\Request;

class InsuranceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insuranceType = InsuranceType::with('coverage')->get();
        return view('admin.latestInsurance.insuranceType.index',compact('insuranceType'));
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
            'type' => 'required',
            'description' => 'required',
            'required_papers' => 'required',
        ]);

        $insuranceType = new InsuranceType();
        $insuranceType->type = $request->type;
        $insuranceType->description = $request->description;
        $insuranceType->required_papers = $request->required_papers;
        if($request->is_death_insurance){
            $insuranceType->is_death_insurance = 1;
        }else{
            $insuranceType->is_death_insurance = 0;
        }
        $saved = $insuranceType->save();
        if($saved){
            return redirect()->back()->with('success','Insurance Type Details Added Successfully.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InsuranceType  $insuranceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'description' => 'required',
            'required_papers' => 'required',
        ]);

        $insuranceType = InsuranceType::find($id);
        $insuranceType->type = $request->type;
        $insuranceType->description = $request->description;
        $insuranceType->required_papers = $request->required_papers;
        if($request->is_death_insurance){
            $insuranceType->is_death_insurance = 1;
        }else{
            $insuranceType->is_death_insurance = 0;
        }
        $saved = $insuranceType->update();
        if($saved){
            return redirect()->back()->with('success','Insurance Type Details Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InsuranceType  $insuranceType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insuranceType = InsuranceType::find($id);
        $insuranceType->delete();
        return redirect()->back()->with('success','Insurance Type Deleted Successfully.');
    }

    public function show($id){
        $insuranceType = InsuranceType::with('coverage')->find($id);
        return view('admin.latestInsurance.insuranceType.show',compact('insuranceType'));
    }

}
