<?php

namespace App\Http\Controllers\Newsportal;

use App\Http\Controllers\Controller;
use App\Models\Newsmodel\News;
use App\Models\Newsmodel\Menu;
use App\Models\Newsmodel\Gallery;
use App\Models\Newsmodel\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Helper\Helper;
use App\Models\BookingNotification;
use App\Models\StoreToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NewsController extends Controller
{
    private $path = 'public/images/';
    private $random;
    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456hdgafshgdfahaiudvfgybsauydgafueGFHFVDAHSFH"), 0, 5);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("16"))) {
            $news = News::orderBy('id', 'desc')->get();
            return view('admin.news.index', compact('news'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::any(checkPermission("16"))) {
            $menus = Menu::orderBy('id', 'desc')->get(['id', 'title_en']);
            return view('admin.news.create', compact('menus'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
        ]);
        $slug = Str::slug($request->title_en, '-');
        $slug = $slug . '_' . $this->random;

        $news = new News;
        $news->user_id = Auth::user()->id;
        $news->menu_id = $request->menu_id;
        foreach (Helper::languageAll() as $language) {
            $news->{"title_" . $language->code} = $request->{"title_" . $language->code};
            $news->{"description_" . $language->code} = $request->{"description_" . $language->code};
            $news->{"seo_title_" . $language->code} = $request->{"seo_title_" . $language->code};
            $news->{"seo_keywords_" . $language->code} = $request->{"seo_keywords_" . $language->code};
            $news->{"seo_description_" . $language->code} = $request->{"seo_description_" . $language->code};
        }
        $news->slug = $slug;
        $news->code = date('YmdHis') . rand(999, 000);
        $news->status = $request->status ? 1 : 0;
        $news->featured = $request->featured ? 1 : 0;
        $news->priority = $request->priority ? 1 : 0;
        if ($request->hasFile('image')) {
            $destination = 'public/images/' . $news->image;
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            $request->file('image')->storeAs('public/images', $fileNameToStore);
            $pathToStore =  asset('storage/images/' . $fileNameToStore);
            $news->image_path = $pathToStore;
            $news->image = $fileNameToStore;
        }
        $user = StoreToken::get();
        if ($user) {
            foreach ($user as $value) {
                $notification_id = $value->device_key;
                $title = "News Notification";
                $message = $news->title_en;
                $topic = 'subscribe';
                topic_based_notification($notification_id, $title, $message,$topic);
            }
        }

        $news->save();

        if ($request->hasfile('gallery')) {
            foreach ($request->file('gallery') as $photo) {
                $imageName = $this->random . '_' . $photo->getClientOriginalName();
                $uploadFile = $photo->storeAs($this->path, $imageName);
                $gallery = new Gallery;
                $gallery->user_id = Auth::user()->id;
                foreach (Helper::languageAll() as $language) {
                    $gallery->{"title_" . $language->code} = $request->{"title_" . $language->code};
                }
                $gallery->image = $imageName;
                $gallery->code = $news->code;
                $gallery->status = 1;
                $gallery->save();
            }
        }

        return redirect()->route('news.index')->with('success', 'News added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return redirect()->route('news.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        if (Gate::any(checkPermission("16"))) {
            $menus = Menu::orderBy('id', 'desc')->get(['id', 'title_en']);
            return view('admin.news.create', compact('menus', 'news'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title_en' => 'required',
        ]);
        $news->menu_id = $request->menu_id;
        foreach (Helper::languageAll() as $language) {
            $news->{"title_" . $language->code} = $request->{"title_" . $language->code};
            $news->{"description_" . $language->code} = $request->{"description_" . $language->code};
            $news->{"seo_title_" . $language->code} = $request->{"seo_title_" . $language->code};
            $news->{"seo_keywords_" . $language->code} = $request->{"seo_keywords_" . $language->code};
            $news->{"seo_description_" . $language->code} = $request->{"seo_description_" . $language->code};
        }
        $news->status = $request->status ? 1 : 0;
        $news->featured = $request->featured ? 1 : 0;
        $news->priority = $request->priority ? 1 : 0;
        if ($request->hasFile('image')) {
            $destination = 'public/images/' . $news->image;
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            $request->file('image')->storeAs('public/images', $fileNameToStore);
            $pathToStore =  asset('storage/images/' . $fileNameToStore);
            $news->image_path = $pathToStore;
            $news->image = $fileNameToStore;
        }

        $news->save();

        if ($request->hasfile('gallery')) {
            foreach ($request->file('gallery') as $photo) {
                $imageName = $this->random . '_' . $photo->getClientOriginalName();
                $uploadFile = $photo->storeAs($this->path, $imageName);
                $gallery = new Gallery;
                $gallery->user_id = Auth::user()->id;
                foreach (Helper::languageAll() as $language) {
                    $gallery->{"title_" . $language->code} = $request->{"title_" . $language->code};
                }
                $gallery->image = $imageName;
                $gallery->code = $news->code;
                $gallery->status = 1;
                $gallery->save();
            }
        }
        if($request->priority){
            $bookingNotification = new BookingNotification();
            $bookingNotification->user_id = Auth::user()->id;
            $bookingNotification->image = $news->image_path;
            $bookingNotification->title = "News Notification Updated";
            $bookingNotification->body = $news->title_en;
            $bookingNotification->type = "News";
            $bookingNotification->save();
       }

        return redirect()->route('news.index')->with('success', 'News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if (Gate::any(checkPermission("16"))) {
            $oldImage = $this->path . $news->image;
            if (Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
    
            Video::where('news_id', $news->id)->delete();
    
            $news->delete();
    
            return redirect()->route('news.index')->with('success', 'News deleted successfully');
        } else {
            return view('viewnotfound');
        }
    }
}