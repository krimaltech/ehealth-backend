<?php

namespace App\Http\Controllers;

use App\Models\LabDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LabDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("20"))) {
            $labdepartment = LabDepartment::all();
            return view('admin.labdepartment.index',compact('labdepartment'));
        }
        else {
            return view('viewnotfound');
        } 
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
        $labdepartment = new LabDepartment();
        $labdepartment->department = $request->department;
        $saved = $labdepartment->save();
        if($saved){
            return redirect()->back()->with('success','Lab Department Added Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabDepartment  $labDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(LabDepartment $labDepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabDepartment  $labDepartment
     * @return \Illuminate\Http\Response
     */
    public function edit(LabDepartment $labDepartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LabDepartment  $labDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $labdepartment = LabDepartment::find($id);
        $labdepartment->department = $request->department;
        $updated = $labdepartment->update();
        if($updated){
            return redirect()->back()->with('success','Lab Department Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LabDepartment  $labDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabDepartment $labDepartment)
    {
        //
    }
}
