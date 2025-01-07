<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Ambulance;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalApiController extends Controller
{
    public function index(){
        $hospital = Hospital::all();
        return response()->json($hospital);
    }

    public function ambulance(){
        $ambulance = Ambulance::all();
        return response()->json($ambulance);
    }
}
