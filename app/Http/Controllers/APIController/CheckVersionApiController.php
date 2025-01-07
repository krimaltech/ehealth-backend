<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\CheckVersion;
use Illuminate\Http\Request;

class CheckVersionApiController extends Controller
{
    public function index(Request $request){
        $check_version = CheckVersion::where('updated_date',$request->updated_date)->first();
        return response()->json($check_version);
    }
}
