<?php

namespace App\Http\Controllers\Newsportal;

use App\Http\Controllers\Controller;
use App\Models\Newsmodel\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helper\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class GalleryController extends Controller
{
    private $path = 'public/images/';

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
            $galleries = Gallery::orderBy('id', 'desc')->get();
            return view('admin.gallery.index', compact('galleries'));
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
            return view('admin.gallery.create');
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
            'image' => 'required|image|mimes:png,jpg,jpeg,gif'
        ]);

        if ($request->image) {
            $imageName = $this->random . '_' . $request->file('image')->getClientOriginalName();
            $uploadFile = $request->file('image')->storeAs($this->path, $imageName);
        }

        $gallery = new Gallery;
        $gallery->user_id = Auth::user()->id;
        foreach (Helper::languageAll() as $language) {
            $gallery->{"title_" . $language->code} = $request->{"title_" . $language->code};
        }
        $gallery->image = $imageName;
        $gallery->status = $request->status ? 1 : 0;
        $gallery->save();

        return redirect()->route('gallery.index')->with('success', 'Image added successfully');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        if (Gate::any(checkPermission("16"))) {
            return view('admin.gallery.create', compact('gallery'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {

        $request->validate([
            'title_en' => 'required',

        ]);


        if ($request->image) {
            $request->validate([
                'image' => 'required|mimes:png,jpg,jpeg,gif',
            ]);
            $oldImage = $this->path . $gallery->image;
            if (Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
            $imageName = $this->random . '_' . $request->file('image')->getClientOriginalName();
            $uploadFile = $request->file('image')->storeAs($this->path, $imageName);
            $gallery->image = $imageName;
        }

        foreach (Helper::languageAll() as $language) {
            $gallery->{"title_" . $language->code} = $request->{"title_" . $language->code};
        }
        $gallery->status = $request->status ? 1 : 0;
        $gallery->update();

        return redirect()->route('gallery.index')->with('success', 'Image Updated successfully');
    }

    public function gallerydelete(Request $request)
    {
        if (Gate::any(checkPermission("16"))) {
            $gallery = Gallery::findOrFail($request->id);
            $oldImage = $this->path . $gallery->image;
            if (Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
    
            $gallery->delete();
    
            return response([$gallery->id]);
        } else {
            return view('viewnotfound');
        }
    }
}