<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class SliderApiController extends Controller
{
    public function index(){
        $slider = Banner::all();
        return response()->json($slider);
    }
}
