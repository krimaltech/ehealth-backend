<?php

namespace App\Http\Controllers\Newsportal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsmodel\Video;
use App\Models\Newsmodel\News;
use App\Helper\Helper;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index(News $news)
    {
        $videos = Video::where('news_id', $news->id)->orderBy('id', 'desc')->get();
        return view('admin.video.index', compact('news', 'videos'));
    }

    public function create(News $news)
    {
        return view('admin.video.create', compact('news'));
    }

    public function store(Request $request, News $news)
    {

        $request->validate([
            'title_en' => 'required',
            'video' => 'required',
        ]);

        $video = new Video;
        $video->user_id = Auth::user()->id;
        $video->news_id = $news->id;
        foreach (Helper::languageAll() as $language) {
            $video->{"title_" . $language->code} = $request->{"title_" . $language->code};
        }
        $video->video = $request->video;
        $video->status = $request->status ? 1 : 0;
        $video->save();
        return redirect()->route('video.index', $news->id)->with('success', 'Video added successfully');
    }

    public function edit(News $news, Video $video)
    {
        return view('admin.video.create', compact('news', 'video'));
    }

    public function update(Request $request, News $news, Video $video)
    {
        $request->validate([
            'title_en' => 'required',
            'video' => 'required',
        ]);
        foreach (Helper::languageAll() as $language) {
            $video->{"title_" . $language->code} = $request->{"title_" . $language->code};
        }
        $video->video = $request->video;
        $video->status = $request->status ? 1 : 0;
        $video->update();
        return redirect()->route('video.index', $news->id)->with('success', 'Video updated successfully');
    }


    public function destroy(Request $request)
    {
        $gallery = Video::findOrFail($request->id);
        $gallery->delete();

        return response([$gallery->id]);
    }
}