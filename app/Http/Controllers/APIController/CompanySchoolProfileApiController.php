<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\CompanySchoolProfile;
use App\Models\Member;
use Illuminate\Http\Request;

class CompanySchoolProfileApiController extends Controller
{
    public function index(Request $request){
        $member = Member::where('member_id',auth()->user()->id)->first();
        $profile = CompanySchoolProfile::where('member_id',$member->id)->first();
        return response()->json($profile);
    }
}
