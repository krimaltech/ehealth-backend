<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\CompanyDetails;
use Illuminate\Http\Request;

class AboutApiController extends Controller
{
    public function index(){
        $about = CompanyDetails::all();
        return response()->json($about);
    }
}
