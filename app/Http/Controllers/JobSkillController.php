<?php

namespace App\Http\Controllers;

use App\Models\JobSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JobSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("19"))) {
            $skills =  JobSkill::all();
            return view('admin.jobskill.index',compact('skills'));
        }
        else {
            return view('viewnotfound');
        } 
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
            'skill' => 'required', 
        ]);
        $skills = new JobSkill();
        $skills->skill = $request->skill;
        $saved = $skills->save();
        if($saved){
            return redirect()->route('skills.index')->with('success','Job Skill Added Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobSkill  $jobSkill
     * @return \Illuminate\Http\Response
     */
    public function show(JobSkill $jobSkill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobSkill  $jobSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'skill' => 'required', 
        ]);
        $skills = JobSkill::find($id);
        $skills->skill = $request->skill;
        $updated = $skills->update();
        if($updated){
            return redirect()->route('skills.index')->with('success','Job Skill Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobSkill  $jobSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::any(checkPermission("19"))) {
            $skills = JobSkill::find($id);
            $deleted = $skills->delete();
            if($deleted){
                return redirect()->route('skills.index')->with('success','Job Skill Deleted Successfully.');
            }
        }
        else {
            return view('viewnotfound');
        } 
    }
}
