<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropdownApiController extends Controller
{
    public function fetchprovince()
    {
        return json_encode(DB::table('provinces')->get());
    }

    public function fetchdistrict(Request $request)
    {
        return json_encode(DB::table('districts')->where('province_id', $request->province_id)->get());
    }

    public function fetchmun(Request $request)
    {
        return json_encode(DB::table('municipalities')->where('district_id', $request->district_id)->get());
    }

    public function fetchward(Request $request)
    {
        return json_encode(DB::table('wards')->where('municipalities_id', $request->municipality_id)->get());
    }
}