<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Insurance;
use App\Models\InsuranceType;
use App\Models\PackageInsuranceCoverage;
use App\Models\PackageInsuranceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InsuranceApiController extends Controller
{
    public function index(){
        $insurance = Insurance::first();
        $packageInsurance = PackageInsuranceDetail::where('user_id',Auth::user()->id)->with('userpackage')->first();
        if($packageInsurance){
            $coverage = PackageInsuranceCoverage::where('package_id',$packageInsurance->userpackage->package_id)->with('insurancetype')->whereHas('insurancetype',function($query){
                $query->where('is_death_insurance',0);
            })->get();
            $insurance['insurance'] = $packageInsurance;
            $insurance['coverage'] = $coverage;
            return response()->json($insurance);
        }else{
            return response()->json(['message' => [
                'error' => ['Activated insurance unavailable.']
            ]],400);
        }
    }

    public function type(){
        $type = InsuranceType::where('is_death_insurance',1)->get();
        return response()->json($type);
    }
}
