<?php

namespace App\Http\Controllers;

use App\Models\PackageSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PackageSliderController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $banner = PackageSlider::all();
            return view('admin.packageslider.index', compact('banner'));
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
        if (Gate::any(['Superadmin', 'Admin'])) {
            return view('admin.packageslider.create');
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
            'banner_title' => 'required',
            'banner_body' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ]);
        $banner = new PackageSlider();
        $banner->banner_title = $request->banner_title;
        $banner->banner_body = $request->banner_body;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $banner->image = $images[0];
                $banner->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $banner->image = $images[0];
                $banner->image_path = $images[1];
            }
        }
        $title = str_replace(' ', '-', $request->banner_title);
        $banner->slug = 'slider-' . $title . '-' . $this->random;
        $saved = $banner->save();
        if ($saved) {
            return redirect()->route('packageslider.index')->with('success', 'Package Slider Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageSlider  $packageSlider
     * @return \Illuminate\Http\Response
     */
    public function show(PackageSlider $packageSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageSlider  $packageSlider
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $banner = PackageSlider::where('slug', $slug)->first();
            return view('admin.packageslider.edit', compact('banner'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackageSlider  $packageSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'banner_title' => 'required',
            'banner_body' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif',
        ]);
        $banner = PackageSlider::where('slug', $slug)->first();
        $banner->banner_title = $request->banner_title;
        $banner->banner_body = $request->banner_body;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $banner->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $banner->image = $images[0];
                $banner->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $banner->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $banner->image = $images[0];
                $banner->image_path = $images[1];
            }
        }
        $title = str_replace(' ', '-', $request->banner_title);
        $banner->slug = 'slider-' . $title . '-' . $this->random;
        $saved = $banner->save();
        if ($saved) {
            return redirect()->route('packageslider.index')->with('success', 'Package Slider Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageSlider  $packageSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = PackageSlider::find($id);
        $destination = 'public/images/' . $banner->image;
        if (Storage::exists($destination)) {
            Storage::delete($destination);
        };
        $deleted = $banner->delete();
        if ($deleted) {
            return response()->json(['success' => 'Package Slider Deleted Successfully']);
        }
    }
}
