<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamCategory;
use Illuminate\Http\Request;

class TeamApiController extends Controller
{
    public function category(){
        $category = TeamCategory::all();
        return response()->json($category);
    }

    public function team($slug){
        $category = TeamCategory::where('slug',$slug)->first();
        $team = Team::where('category_id',$category->id)->where('status',1)->get();
        return response()->json(['team' => $team,'category' => $category]);
    }
}
