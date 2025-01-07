<?php

namespace App\Http\Controllers;

use App\Models\LabProfile;
use App\Models\LabTest;
use App\Models\Package;
use App\Models\PackageScreening;
use App\Models\ScreeningTest;
use Illuminate\Http\Request;

class ScreeningTestController extends Controller
{
    public function addfetchtest(Request $request,$id){
        if($request->type == 'Detail Screening'){
            $packageScreening = PackageScreening::where('package_id',$id)->where('screening_id',1)->first();
            $screeningTest =  ScreeningTest::where('package_screening_id',$packageScreening->id)->pluck('labtest_id');
            $labtests = LabTest::whereNotIn('id',$screeningTest)->get();
            return response()->json($labtests);
        }
        if($request->type == 'Follow Up Screening'){
            $packageScreening = PackageScreening::where('package_id',$id)->where('screening_id', 2)->first();
            $screeningTest =  ScreeningTest::where('package_screening_id',$packageScreening->id)->pluck('labtest_id');
            $labtests = LabTest::whereNotIn('id',$screeningTest)->get();
            return response()->json($labtests);
        }
    }

    public function editfetchtest(Request $request,$id){
        if($request->type == 'Detail Screening'){
            $packageScreening = PackageScreening::where('package_id',$id)->where('screening_id',1)->first();
            $screeningTest =  ScreeningTest::where('package_screening_id',$packageScreening->id)->with('labtest')->get();
            return response()->json($screeningTest);
        }
        if($request->type == 'Follow Up Screening'){
            $packageScreening = PackageScreening::where('package_id',$id)->where('screening_id', 2)->first();
            $screeningTest =  ScreeningTest::where('package_screening_id',$packageScreening->id)->with('labtest')->get();
            return response()->json($screeningTest);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($package_id)
    {
        $package = Package::find($package_id);
        return view('admin.screeningtest.create',compact('package'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->screening_type == 'Detail Screening'){
            $package_screening = PackageScreening::where('package_id',$request->package_id)->where('screening_id',1)->first();

            foreach($request->labtest_id as $testkey => $testid){
                if(!isset($request->man[$testkey]) && !isset($request->woman[$testkey]) && !isset($request->child[$testkey])){
                    continue;
                }
                $test = new ScreeningTest();
                $test->package_screening_id = $package_screening->id;
                $test->labtest_id = $testid;
                $test->man = isset($request->man[$testkey]) ? 1:0;
                $test->woman = isset($request->woman[$testkey]) ? 1:0;
                $test->child = isset($request->child[$testkey]) ? 1:0;
                $saved = $test->save();
            }  
        }
        if($request->screening_type == 'Follow Up Screening'){
            $package_screening = PackageScreening::where('package_id',$request->package_id)->where('screening_id', '!=' ,1)->get()->pluck('id');
            foreach($package_screening as $screening){
                foreach($request->labtest_id as $testkey => $testid){
                    if(!isset($request->man[$testkey]) && !isset($request->woman[$testkey]) && !isset($request->child[$testkey])){
                        continue;
                    }
                    $test = new ScreeningTest();
                    $test->package_screening_id = $screening;
                    $test->labtest_id = $testid;
                    $test->man = isset($request->man[$testkey]) ? 1:0;
                    $test->woman = isset($request->woman[$testkey]) ? 1:0;
                    $test->child = isset($request->child[$testkey]) ? 1:0;
                    $saved = $test->save();
                }  
            }
        }

        if($saved){
            return redirect()->route('package.index')->with('success','Screening Test Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScreeningTest  $screeningTest
     * @return \Illuminate\Http\Response
     */
    public function show(ScreeningTest $screeningTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScreeningTest  $screeningTest
     * @return \Illuminate\Http\Response
     */
    public function edit($package_id)
    {
        $package = Package::find($package_id);
        return view('admin.screeningtest.edit',compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScreeningTest  $screeningTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //return $request;
        if($request->screening_type == 'Detail Screening'){
            foreach($request->labtest_id as $screeningtestkey => $testid){
                if(!isset($request->man[$screeningtestkey]) && !isset($request->woman[$screeningtestkey]) && !isset($request->child[$screeningtestkey])){
                    $test = ScreeningTest::find($screeningtestkey);
                    $test->delete();
                }else{
                    $test = ScreeningTest::find($screeningtestkey);
                    $test->labtest_id = $testid;
                    $test->man = isset($request->man[$screeningtestkey]) ? 1:0;
                    $test->woman = isset($request->woman[$screeningtestkey]) ? 1:0;
                    $test->child = isset($request->child[$screeningtestkey]) ? 1:0;
                    $saved = $test->update();
                }
            }  
        }
        if($request->screening_type == 'Follow Up Screening'){
            $package_screening = PackageScreening::where('package_id',$request->package_id)->where('screening_id','!=',1)->get()->pluck('id');
            foreach($request->labtest_id as $screeningtestkey => $testid){
                $tests = ScreeningTest::whereIn('package_screening_id', $package_screening)->where('labtest_id',$testid)->get();
                if(!isset($request->man[$screeningtestkey]) && !isset($request->woman[$screeningtestkey]) && !isset($request->child[$screeningtestkey])){
                    foreach($tests as $test){
                        $test->delete();
                    }
                }else{
                    foreach($tests as $test){
                        $test->labtest_id = $testid;
                        $test->man = isset($request->man[$screeningtestkey]) ? 1:0;
                        $test->woman = isset($request->woman[$screeningtestkey]) ? 1:0;
                        $test->child = isset($request->child[$screeningtestkey]) ? 1:0;
                        $saved = $test->update();
                    }
                }
            }  
        }
        return redirect()->back()->with('success','Screening Test Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScreeningTest  $screeningTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScreeningTest $screeningTest)
    {
        //
    }
}
