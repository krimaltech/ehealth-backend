<?php

namespace App\Http\Controllers;

use App\Models\LabDepartment;
use App\Models\LabProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LabProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("20"))) {
            $labprofile = LabProfile::with('labdepartment')->get();
            $labdepartment = LabDepartment::all();
            return view('admin.labprofile.index',compact('labprofile','labdepartment'));
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
        $labprofile = new LabProfile();
        $labprofile->department_id = $request->department_id;
        $labprofile->profile_name = $request->profile_name;
        $labprofile->price = $request->price;
        $saved = $labprofile->save();
        if($saved){
            return redirect()->route('labprofile.index')->with('success','Lab Profile Added Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabProfile  $labProfile
     * @return \Illuminate\Http\Response
     */
    public function show(LabProfile $labProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabProfile  $labProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(LabProfile $labProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LabProfile  $labProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $labprofile = LabProfile::find($id);
        $labprofile->department_id = $request->department_id;
        $labprofile->profile_name = $request->profile_name;
        $labprofile->price = $request->price;
        $updated = $labprofile->update();
        if($updated){
            return redirect()->route('labprofile.index')->with('success','Lab Profile Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LabProfile  $labProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabProfile $labProfile)
    {
        //
    }
}
