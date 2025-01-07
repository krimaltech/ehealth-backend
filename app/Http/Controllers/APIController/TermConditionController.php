<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Models\TermCondition;
use Illuminate\Http\Request;

class TermConditionController extends Controller
{
    public function index(Request $request){
        $termcondition= TermCondition::where('type',$request->type)->first();
        return response()->json($termcondition, 200);
    }
}
