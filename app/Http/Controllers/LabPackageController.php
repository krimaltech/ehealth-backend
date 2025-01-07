<?php

namespace App\Http\Controllers;

use App\Models\LabPackage;
use App\Models\LabPackageContent;
use App\Models\LabProfile;
use App\Models\LabTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LabPackageController extends Controller
{
    public function fetchcontent(){
        $labprofile = LabProfile::with('labtest')->get();
        return response()->json($labprofile);
    }

    public function fetchlabtest($id){
        $labtest = LabTest::where('profile_id',$id)->get()->pluck('id');
        return response()->json($labtest);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("20"))) {
            $labpackage = LabPackage::all();
            return view('admin.labpackage.index',compact('labpackage'));
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
            $labprofile = LabProfile::with('labtest')->get();
            $labtest = LabTest::all();
            return view('admin.labpackage.create',compact('labprofile','labtest'));
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
        //return $request;
        $request->validate([
            'package_name' => 'required',
            'price' => 'required',
        ]);

        $labpackage = new LabPackage();
        $labpackage->package_name = $request->package_name;
        $labpackage->price = $request->price;
        $saved = $labpackage->save();
        if($saved){
            if($request->labprofile_id){
                foreach($request->labprofile_id as $profile){
                    $labtest = new LabPackageContent();
                    $labtest->labpackage_id = $labpackage->id;
                    $labtest->labprofile_id = $profile;
                    $labtest->save();
                }
            }
            if($request->labtest_id){
                foreach($request->labtest_id as $test){
                    $labtest = new LabPackageContent();
                    $labtest->labpackage_id = $labpackage->id;
                    $labtest->labtest_id = $test;
                    $labtest->save();
                }
            }
        }
        return redirect()->route('labpackage.index')->with('success','Lab Package Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabPackage  $labPackage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::any(checkPermission("20"))) {
            $labpackage = LabPackage::with(['labcontents.labprofile.labtest','labcontents.labtest'])->find($id);
            return view('admin.labpackage.show',compact('labpackage'));
        }
        else {
            return view('viewnotfound');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabPackage  $labPackage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::any(checkPermission("20"))) {
            $labpackage = LabPackage::with(['labcontents.labprofile.labtest','labcontents.labtest'])->find($id);
            $labpackageprofile = $labpackage->labcontents->where('labprofile_id','!=',null)->pluck('labprofile_id');
            $labpackagetest = $labpackage->labcontents->where('labtest_id','!=',null)->pluck('labtest_id');
            $labprofile = LabProfile::with('labtest')->whereNotIn('id',$labpackageprofile)->get();
            $labtest = LabTest::whereNotIn('id',$labpackagetest)->get();
            return view('admin.labpackage.edit',compact('labpackage','labprofile','labtest','labpackageprofile','labpackagetest'));
        }
        else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LabPackage  $labPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request;
        $request->validate([
            'package_name' => 'required',
            'price' => 'required',
        ]);

        $labpackage = LabPackage::with(['labcontents.labprofile.labtest','labcontents.labtest'])->find($id);
        $labpackage->package_name = $request->package_name;
        $labpackage->price = $request->price;
        $labpackage->update();

        //delete the lab package content if test or profile checkbox is not checked when updated
        $labpackageId = [];
        if($request->editlabprofile_id && $request->editlabtest_id){
            $labpackageId = array_merge($request->editlabprofile_id, $request->editlabtest_id);
        }elseif($request->editlabprofile_id){
            $labpackageId  = $request->editlabprofile_id;
        }elseif($request->editlabtest_id){
            $labpackageId = $request->editlabtest_id;
        }
        $labpackagecontent =  LabPackageContent::where('labpackage_id',$id)->whereNotIn('id',$labpackageId)->get();
        foreach($labpackagecontent as $content){
            $content->delete();
        }

        //add the lab package content if test or profile checkbox is checked from (add package contents checkbox) when updated
        if($request->labprofile_id){
            foreach($request->labprofile_id as $profile){
                $labtest = new LabPackageContent();
                $labtest->labpackage_id = $labpackage->id;
                $labtest->labprofile_id = $profile;
                $labtest->save();
            }
        }
        if($request->labtest_id){
            foreach($request->labtest_id as $test){
                $labtest = new LabPackageContent();
                $labtest->labpackage_id = $labpackage->id;
                $labtest->labtest_id = $test;
                $labtest->save();
            }
        }
        return redirect()->route('labpackage.index')->with('success','Lab Package Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LabPackage  $labPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabPackage $labPackage)
    {
        //
    }
}
