<?php

namespace App\Http\Controllers;

use App\Models\InsuranceType;
use App\Models\Package;
use App\Models\PackageInsuranceCoverage;
use Illuminate\Http\Request;

class PackageInsuranceCoverageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $insuranceType = InsuranceType::find($id);
        $packages = Package::where('id','!=',10)->get();
        return view('admin.latestInsurance.insuranceCoverage.index',compact('insuranceType','packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        foreach($request->amount as $key=>$amount){
            if($amount != null){
                $coverage = new PackageInsuranceCoverage();
                $coverage->package_id = $key;
                $coverage->insurance_type_id = $id;
                $coverage->amount = $amount;
                $coverage->save();
            }
        }        
        return redirect()->route('insurancetype.index')->with('success','Package Insurance Coverage Added Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $insuranceType = InsuranceType::with('coverage.package')->find($id);
        $package = $insuranceType->coverage->pluck('package_id');
        $package->push(10);
        $packages = Package::whereNotIn('id',$package)->get();     
        return view('admin.latestInsurance.insuranceCoverage.edit',compact('insuranceType','packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->amount){
            foreach($request->amount as $key=>$amount){
                if($amount != null){
                    $coverage = new PackageInsuranceCoverage();
                    $coverage->package_id = $key;
                    $coverage->insurance_type_id = $id;
                    $coverage->amount = $amount;
                    $coverage->save();
                }
            } 
        } 
        foreach($request->update_amount as $updateKey=>$updateAmount){
            $updateCoverage = PackageInsuranceCoverage::find($updateKey);
            if($updateAmount != null){
                $updateCoverage->amount = $updateAmount;
                $updateCoverage->update();
            }else{
                $updateCoverage->delete();
            }
        }  
        return redirect()->route('insurancetype.index')->with('success','Package Insurance Coverage Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
