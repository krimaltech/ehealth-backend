<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\RolePermission;
use App\Models\VendorAdvertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class VendorAdvertisementController extends Controller
{
    protected $random;
    // protected $permission;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
        // $this->permission = RolePermission::where('permission_id',1)->where('role_id',3)->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Gate::allows(['Vendor']) && Helper::is_exclusive()) {
            $advertisement = VendorAdvertisement::all();
            return view('admin.vendoradvertisement.index', compact('advertisement'));
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
            return view('admin.vendoradvertisement.create');
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
        $advertisement = new VendorAdvertisement();
        $advertisement->user_id = auth()->user()->id;
        $advertisement->title = $request->title;
        $advertisement->position = $request->position;
        $advertisement->slug = $request->title . $this->random;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $advertisement->image = $images[0];
                $advertisement->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $advertisement->image = $images[0];
                $advertisement->image_path = $images[1];
            }
        }
        $advertisement->save();
        return redirect()->route('vendorads.index')->with('success', 'Advertisement Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VendorAdvertisement  $vendorAdvertisement
     * @return \Illuminate\Http\Response
     */
    public function show(VendorAdvertisement $vendorAdvertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VendorAdvertisement  $vendorAdvertisement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('Vendor') && Helper::is_exclusive()) {
            $advertisement = VendorAdvertisement::findOrFail($id);
            return view('admin.vendoradvertisement.edit', compact('advertisement'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VendorAdvertisement  $vendorAdvertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $advertisement = VendorAdvertisement::findOrFail($id);
        $advertisement->user_id = auth()->user()->id;
        $advertisement->title = $request->title;
        $advertisement->position = $request->position;
        $advertisement->slug = $request->title . $this->random;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $advertisement->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $advertisement->image = $images[0];
                $advertisement->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $advertisement->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $advertisement->image = $images[0];
                $advertisement->image_path = $images[1];
            }
        }
        $advertisement->update();
        return redirect()->route('vendorads.index')->with('success', 'Advertisement Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VendorAdvertisement  $vendorAdvertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorAdvertisement $vendorAdvertisement)
    {
        //
    }
}
