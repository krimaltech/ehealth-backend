<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Newsmodel\Menu;
use Illuminate\Http\Request;

class MenuApiController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->slug;
        $menus= Menu::where('menu_id',null)->with('children')->orderBy('position','asc')
        ->when($slug, function ($query) use($slug){
            return $query->where('slug',$slug);
        })
        ->get();
        return response()->json($menus);
    }
}
