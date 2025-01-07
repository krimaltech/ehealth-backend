<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\OurService;
use Illuminate\Http\Request;

class ServiceApiController extends Controller
{
    public function index(){
        $services = OurService::where('status',1)->get();
        return response()->json($services);
    }

    public function service($slug){
        $service = OurService::where('slug',$slug)->first();
        return response()->json($service);
    }
}
