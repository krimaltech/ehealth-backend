<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Menu;
use App\Models\ExpoAndEvent;
use App\Models\Newsmodel\News;
use App\NewsView;
use Illuminate\Http\Request;

class NewsApiController extends Controller
{
    public function index(Request $request)
    {
        $menu_id = $request->menu_id;
        $take = $request->take;
        $slug = $request->slug;
        $search = $request->search;
        if ($menu_id || $take || $slug || $search ) {
            $query = News::orderBy('created_at','desc')->where('featured',1)->with('menu:id,title_en', 'user:id,name')->when($menu_id, function ($q) use ($menu_id) {
                return $q->where('menu_id', $menu_id);
            })
                ->when($take, function ($q) use ($take) {
                    return $q->latest()->take($take);
                })
                ->when($slug, function ($q) use ($slug) {
                    return $q->where('slug', $slug);
                })
                ->when($search, function ($q) use ($search){
                    $q->where('description_en', 'like', '%'.$search.'%')
                        ->orWhere('title_en', 'like', '%'.$search.'%');
                })
                ->paginate(9)->withQueryString();
        } else {
            $query = News::orderBy('created_at','desc')->where('featured',1)->with('menu:id,title_en', 'user:id,name')->select('id','menu_id','user_id','title_en','image_path','created_at')->paginate(9)->withQueryString();
        }
        
        return response()->json($query);
    }

    public function homepage(Request $request)
    {
        $menu_id = $request->menu_id;
        $take = $request->take;
        $show = $request->show;
        $slug = $request->slug;
        $search = $request->search;
        $popular = $request->popular;
        $limit = $request->limit;
            if ($menu_id || $take || $slug || $popular || $limit ) {
                $query = News::orderBy('created_at','desc')->with('menu:id,title_en', 'user:id,name')->when($menu_id, function ($q) use ($menu_id) {
                    return $q->where('menu_id', $menu_id);
                })
                    ->when($take, function ($q) use ($take) {
                        return $q->latest()->take($take);
                    })
                    ->when($limit || $popular, function ($q) use ($limit,$popular) {
                        return $q->orderBy('views', $popular)->limit($limit);
                    })
                    ->when($slug, function ($q) use ($slug) {
                        return $q->where('slug', $slug);
                    })
                    ->when($search, function ($q) use ($search){
                        $q->where('description_en', 'like', '%'.$search.'%')
                            ->orWhere('title_en', 'like', '%'.$search.'%');
                    })
                    ->get();
            } else {
                $query = News::orderBy('created_at','desc')->with('menu:id,title_en', 'user:id,name')->select('id','menu_id','user_id','title_en','image_path','created_at')->take($show)->get();
            }
            
        return response()->json($query);
    }
    public function show(News $post)
    {
        //Some bits from the following query ("category", "user") are made for my own application, but I felt like leaving it for inspiration. 
        $post = News::with('menu', 'user')->find($post->id);
        // if ($post->showPost()) { // this will test if the user viwed the post or not
        //     return $post;
        // }

        $post->increment('views'); //I have a separate column for views in the post table. This will increment the views column in the posts table.
        $post->save();
        return response()->json($post);
    }

    public function eventandexpo()
    {
        $expo = ExpoAndEvent::orderBy('created_at','desc')->get();
        return response()->json($expo);
    }
}
