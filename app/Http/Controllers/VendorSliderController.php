<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Vendor;
use App\Models\VendorSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class VendorSliderController extends Controller
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
        if (Gate::allows('Vendor') && Helper::is_exclusive()) {
            $vendor_id = Vendor::where('vendor_id', Auth::user()->id)->first();
            $banner = VendorSlider::where('vendor_id', $vendor_id->id)->get();
            return view('admin.vendorslider.index', compact('banner'));
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
        if (Gate::allows('Vendor') && Helper::is_exclusive()) {
            return view('admin.vendorslider.create');
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
        $banner = new VendorSlider();
        $banner->banner_title = $request->banner_title;
        $banner->banner_body = $request->banner_body;
        $vendor_id = Vendor::where('vendor_id', Auth::user()->id)->first();
        $banner->vendor_id = $vendor_id->id;
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
            return redirect()->route('vendorslider.index')->with('success', 'Slider Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VendorSlider  $vendorSlider
     * @return \Illuminate\Http\Response
     */
    public function show(VendorSlider $vendorSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VendorSlider  $vendorSlider
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if (Gate::allows('Vendor') && Helper::is_exclusive()) {
            $banner = VendorSlider::where('slug', $slug)->first();
            return view('admin.vendorslider.edit', compact('banner'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VendorSlider  $vendorSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'banner_title' => 'required',
            'banner_body' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif',
        ]);
        $banner = VendorSlider::where('slug', $slug)->first();
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
            return redirect()->route('vendorslider.index')->with('success', 'Slider Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VendorSlider  $vendorSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = VendorSlider::find($id);
        if (env('STORAGE_TYPE') == 'native') {
            $destination = 'public/images/' . $banner->image;
            if (Storage::exists($destination)) {
                Storage::delete($destination);
            };
        } else {
            $destination = 'images/' . $banner->image;
            Storage::disk('minio')->delete($destination);
        }
        $deleted = $banner->delete();
        if ($deleted) {
            return response()->json(['success' => 'Slider Deleted Successfully']);
        }
    }
}
