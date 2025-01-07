<?php

namespace App\Http\Controllers;

use App\Models\LabDepartment;
use App\Models\LabProfile;
use App\Models\LabTest;
use App\Models\LabValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LabTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("20"))) {
            $labtest = LabTest::with(['labdepartment','labprofile'])->get();
            return view('admin.labtest.index',compact('labtest'));
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
        if (Gate::any(checkPermission("20"))) {
            $labprofile = LabProfile::all();
            $labdepartment = LabDepartment::all();
            return view('admin.labtest.create',compact('labprofile','labdepartment'));
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
            'department_id' => 'required',
            'tests' => 'required',
            'code' => 'required|unique:lab_tests',
            'test_result_type' => 'required',
        ]);

        $test = new LabTest();
        $test->department_id = $request->department_id;
        $test->profile_id = $request->profile_id;
        $test->tests = $request->tests;
        $test->code = $request->code;
        $test->unit = $request->unit;
        $test->price = $request->price;
        $test->test_result_type = $request->test_result_type;
        if($request->test_result_type == 'Range'){
            $test->male_min_range = $request->male_min_range;
            $test->male_max_range = $request->male_max_range;
            $test->male_amber_min_range = $request->male_amber_min_range;
            $test->male_amber_max_range = $request->male_amber_max_range;
            $test->male_red_min_range = $request->male_red_min_range;
            $test->male_red_max_range = $request->male_red_max_range;
            $test->female_min_range = $request->female_min_range;
            $test->female_max_range = $request->female_max_range;
            $test->female_amber_min_range = $request->female_amber_min_range;
            $test->female_amber_max_range = $request->female_amber_max_range;
            $test->female_red_min_range = $request->female_red_min_range;
            $test->female_red_max_range = $request->female_red_max_range;
            $test->child_min_range = $request->child_min_range;
            $test->child_max_range = $request->child_max_range;
            $test->child_amber_min_range = $request->child_amber_min_range;
            $test->child_amber_max_range = $request->child_amber_max_range;
            $test->child_red_min_range = $request->child_red_min_range;
            $test->child_red_max_range = $request->child_red_max_range;
        }
        $saved = $test->save();
        if($request->test_result_type == 'Value' || $request->test_result_type == 'Value and Image'){
            foreach($request->result_name as $result){
                $labvalue = new LabValue();
                $labvalue->labtest_id = $test->id;
                $labvalue->result_name = $result;
                $labvalue->save();
            }
        }
        if($saved){
            return redirect()->route('labtest.index')->with('success','Lab Test Added Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::any(checkPermission("20"))) {
            $labtest = LabTest::with(['labdepartment','labprofile','labvalue'])->find($id);
            return view('admin.labtest.show',compact('labtest'));
        }
        else {
            return view('viewnotfound');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::any(checkPermission("20"))) {
            $labtest = LabTest::with('labvalue')->find($id);
            $labprofile = LabProfile::all();
            $labdepartment = LabDepartment::all();
            return view('admin.labtest.edit',compact('labtest','labprofile','labdepartment'));
        }
        else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request;
        $request->validate([
            'department_id' => 'required',
            'tests' => 'required',
            'code' => 'required',
        ]);

        $test = LabTest::find($id);
        $test->department_id = $request->department_id;
        $test->profile_id = $request->profile_id;
        $test->tests = $request->tests;
        $test->code = $request->code;
        $test->unit = $request->unit;
        $test->price = $request->price;
        $test->test_result_type = $request->test_result_type;
        if($request->test_result_type == 'Range'){
            $test->male_min_range = $request->male_min_range;
            $test->male_max_range = $request->male_max_range;
            $test->male_amber_min_range = $request->male_amber_min_range;
            $test->male_amber_max_range = $request->male_amber_max_range;
            $test->male_red_min_range = $request->male_red_min_range;
            $test->male_red_max_range = $request->male_red_max_range;
            $test->female_min_range = $request->female_min_range;
            $test->female_max_range = $request->female_max_range;
            $test->female_amber_min_range = $request->female_amber_min_range;
            $test->female_amber_max_range = $request->female_amber_max_range;
            $test->female_red_min_range = $request->female_red_min_range;
            $test->female_red_max_range = $request->female_red_max_range;
            $test->child_min_range = $request->child_min_range;
            $test->child_max_range = $request->child_max_range;
            $test->child_amber_min_range = $request->child_amber_min_range;
            $test->child_amber_max_range = $request->child_amber_max_range;
            $test->child_red_min_range = $request->child_red_min_range;
            $test->child_red_max_range = $request->child_red_max_range;
            
            $labvalue = LabValue::where('labtest_id',$test->id)->get();
            foreach($labvalue as $value){
                $value->delete();
            }
        }
        $updated = $test->update();
        if($request->test_result_type == 'Value' || $request->test_result_type == 'Value and Image'){
            $test->male_min_range = null;
            $test->male_max_range = null;
            $test->male_amber_min_range = null;
            $test->male_amber_max_range = null;
            $test->male_red_min_range = null;
            $test->male_red_max_range = null;
            $test->female_min_range = null;
            $test->female_max_range = null;
            $test->female_amber_min_range = null;
            $test->female_amber_max_range = null;
            $test->female_red_min_range = null;
            $test->female_red_max_range = null;
            $test->child_min_range = null;
            $test->child_max_range = null;
            $test->child_amber_min_range = null;
            $test->child_amber_max_range = null;
            $test->child_red_min_range = null;
            $test->child_red_max_range = null;
            if($request->result_name){
                foreach($request->result_name as $labvalueId=>$result){
                    $labvalue = LabValue::find($labvalueId);                
                    if($result == null){
                        $labvalue->delete();
                    }else{
                        $labvalue->labtest_id = $test->id;
                        $labvalue->result_name = $result;
                        $labvalue->update();
                    }
                }
            }
            if($request->result){
                foreach($request->result as $result){
                    $labvalue = new LabValue();
                    $labvalue->labtest_id = $test->id;
                    $labvalue->result_name = $result;
                    $labvalue->save();
                }
            }
        }
        if($updated){
            return redirect()->route('labtest.index')->with('success','Lab Test Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabTest $labTest)
    {
        //
    }
}
