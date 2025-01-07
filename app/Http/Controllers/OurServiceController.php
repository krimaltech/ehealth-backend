<?php

namespace App\Http\Controllers;

use App\Models\OurService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class OurServiceController extends Controller
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
        if (Gate::any(checkPermission("14"))) {
            $services = OurService::all();
            return view('admin.ourservice.index', compact('services'));
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
        if (Gate::any(checkPermission("14"))) {
            return view('admin.ourservice.create');
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
            'service_title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'icon' => 'required|mimes:jpg,jpeg,png,gif',
            'status' => 'required',
            'seo_keyword' => 'required',
            'seo_description' => 'required',
            'slug' => 'required|unique:our_services',
        ]);

        $service = new OurService();
        $service->service_title  = $request->service_title;
        $service->short_description  = $request->short_description;
        $service->long_description  = $request->long_description;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $service->image = $images[0];
                $service->image_path = $images[1];
            }
            if ($request->hasFile('icon')) {
                $images1 = storeImageLaravel($request, 'icon', 'icon_path');
                $service->icon = $images1[0];
                $service->icon_path = $images1[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $service->image = $images[0];
                $service->image_path = $images[1];
            }

            if ($request->hasFile('icon')) {
                $images1 = storeImageStorage($request, 'icon', 'icon_path');
                $service->icon = $images1[0];
                $service->icon_path = $images1[1];
            }
        }
        // $title = str_replace(' ', '-', $request->service_title);
        // $service_title = str_replace('/', '-', $title);
        // $service->slug = $service_title.'-'.$this->random;
        $service->slug = $request->slug;
        $service->status = $request->status;
        $service->seo_keyword = $request->seo_keyword;
        $service->seo_description = $request->seo_description;
        $saved = $service->save();
        if ($saved) {
            return redirect()->route('ourservice.index')->with('success', 'Service Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OurService  $ourService
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $service = OurService::where('slug', $slug)->first();
        return view('admin.ourservice.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OurService  $ourService
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if (Gate::any(checkPermission("14"))) {
            $service = OurService::where('slug', $slug)->first();
            return view('admin.ourservice.edit', compact('service'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurService  $ourService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $service = OurService::where('slug', $slug)->first();

        $request->validate([
            'service_title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'icon' => 'mimes:jpg,jpeg,png,gif',
            'status' => 'required',
            'slug' => 'required|unique:our_services,slug,' . $service->id,
        ]);

        $service->service_title  = $request->service_title;
        $service->short_description  = $request->short_description;
        $service->long_description  = $request->long_description;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $service->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $service->image = $images[0];
                $service->image_path = $images[1];
            }
            if ($request->hasFile('icon')) {
                $destination1 = 'public/images/' . $service->icon;
                if (Storage::exists($destination1)) {
                    Storage::delete($destination1);
                };
                $images1 = storeImageLaravel($request, 'icon', 'icon_path');
                $service->icon = $images1[0];
                $service->icon_path = $images1[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $service->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $service->image = $images[0];
                $service->image_path = $images[1];
            }

            if ($request->hasFile('icon')) {
                $destination1 = 'images/' . $service->icon;
                Storage::disk('minio')->delete($destination1);
                $images1 = storeImageStorage($request, 'icon', 'icon_path');
                $service->icon = $images1[0];
                $service->icon_path = $images1[1];
            }
        }
        // $title = str_replace(' ', '-', $request->service_title);
        // $service_title = str_replace('/', '-', $title);
        // $service->slug = $service_title.'-'.$this->random;
        $service->slug = $request->slug;
        $service->status = $request->status;
        $saved = $service->save();
        if ($saved) {
            return redirect()->route('ourservice.index')->with('success', 'Service Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurService  $ourService
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if (Gate::any(checkPermission("14"))) {
            $service = OurService::where('slug', $slug)->first();
            $imagedestination = 'public/images/' . $service->image;
            $icondestination = 'public/images/' . $service->icon;
            if (Storage::exists($icondestination)) {
                Storage::delete($icondestination);
            };
            if (Storage::exists($imagedestination)) {
                Storage::delete($imagedestination);
            };
            $deleted = $service->delete();
            if ($deleted) {
                return redirect()->route('ourservice.index')->with('success', 'Service Deleted Successfully');
            }
        } else {
            return view('viewnotfound');
        }
    }

    public function updateStatus($id)
    {
        if (Gate::any(checkPermission("14"))) {
            $service = OurService::find($id);
            $status = !$service->status;
            $service->status = !$service->status;
            $service->update();
            return response()->json(['success' => 'Status Updated Successfully.', 'status' => $status, 'id' => $id]);
        } else {
            return view('viewnotfound');
        }
    }

    public function checkSlug(Request $request)
    {
        if ($request->id) {
            $check = OurService::where('slug', $request->slug)->where('id', '!=', $request->id)->first();
            if ($check) {
                return response()->json(true);
            } else {
                return response()->json(false);
            }
        } else {
            $check = OurService::where('slug', $request->slug)->first();
            if ($check) {
                return response()->json(true);
            } else {
                return response()->json(false);
            }
        }
    }

    public function updateSeo(Request $request, $slug)
    {
        $request->validate([
            'seo_keyword' => 'required',
            'seo_description' => 'required'
        ]);
        $service = OurService::where('slug', $slug)->first();
        $service->seo_keyword = $request->seo_keyword;
        $service->seo_description = $request->seo_description;
        $service->update();
        return redirect()->route('ourservice.index')->with('success', 'Service SEO Updated Successfully.');
    }
}
