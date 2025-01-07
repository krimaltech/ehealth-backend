<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageSlider;
use Illuminate\Http\Request;

class PackageApiController extends Controller
{
    public function index(Request $request){
        if($request->slug){
            $packages = Package::where('slug',$request->slug)->with('fees')->first();
        }else{
            $packages = Package::with('fees')->get();
        }
       
        //return $services;
        return response()->json($packages);
    }

    public function slider(){
        $slider = PackageSlider::all();
        return response()->json($slider);
    }
}
