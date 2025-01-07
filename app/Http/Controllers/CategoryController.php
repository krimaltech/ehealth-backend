<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
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
        if (Gate::any(checkPermission("17"))) {
            $category = Category::orderBy('created_at','desc')->get();
            return view('admin.category.index', compact('category'));
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
        if (Gate::any(checkPermission("17"))) {
            $vendorType = VendorType::all();
            $categories = Category::all();
            return view('admin.category.create', compact('categories', 'vendorType'));
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
            'name' => 'required|unique:categories',
        ]);
        $categories = new Category();
        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->parent_id = $request->parent_id;
        $name = str_replace(' ', '-', $request->name);
        $categories->slug =  'category-' . $name . '-' . $this->random;
        $categories->featured = $request->featured;
        $categories->status = $request->status;
        $categories->vendor_type_id = $request->vendor_type_id;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $categories->image = $images[0];
                $categories->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $categories->image = $images[0];
                $categories->image_path = $images[1];
            }
        }
        $categories->save();
        return redirect()->route('category.index')->with('success', 'Category Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::any(checkPermission("17"))) {
            $categories = Category::findOrFail($id);
            $category = Category::get();
            $vendorType = VendorType::all();
            return view('admin.category.edit', compact('categories', 'category', 'vendorType'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
        ]);
        $categories = Category::findOrFail($id);
        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->parent_id = $request->parent_id;
        $name = str_replace(' ', '-', $request->name);
        $categories->slug =  'category-' . $name . '-' . $this->random;
        $categories->featured = $request->featured;
        $categories->status = $request->status;
        $categories->vendor_type_id = $request->vendor_type_id;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $categories->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $categories->image = $images[0];
                $categories->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $categories->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $categories->image = $images[0];
                $categories->image_path = $images[1];
            }
        }
        $categories->save();
        return redirect()->route('category.index')->with('success', 'Category Saved Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
