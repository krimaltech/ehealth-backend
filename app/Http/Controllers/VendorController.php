<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
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
        $vendor = Vendor::where('vendor_id', Auth::user()->id)->with('user.kyc')->first();
        return view('admin.vendor.index', compact('vendor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // 
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
            // 'vendor_id' => 'required|vendor_id|unique:vendors,vendor_id,',
        ]);
        $vendor = new Vendor();
        $vendor->vendor_id = auth()->user()->id;
        $vendor->store_name = $request->store_name;
        $vendor->vendor_type = $request->vendor_type;
        $vendor->address = $request->address;
        $vendor->slug = 'vendor' . $this->random;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $vendor->image = $images[0];
                $vendor->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $vendor->image = $images[0];
                $vendor->image_path = $images[1];
            }
        }
        $saved = $vendor->save();

        if ($saved) {
            return redirect()->route('vendor.index')->with('success', 'Vendor Updated Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $vendor = Vendor::where('slug', $slug)->first();
        return view('admin.vendor.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $vendor = Vendor::where('slug', $slug)->first();
        $vendor->vendor_id = auth()->user()->id;
        $vendor->address = $request->address;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $vendor->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $vendor->image = $images[0];
                $vendor->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $vendor->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $vendor->image = $images[0];
                $vendor->image_path = $images[1];
            }
        }
        if ($vendor->vendor_type == 3) {
            $user = User::where("id", $vendor->vendor_id)->first();
            $user->subrole = 5;
            $user->update();
        }
        $saved = $vendor->save();
        if ($saved) {
            return redirect()->route('vendor.index')->with('success', 'Vendor Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
