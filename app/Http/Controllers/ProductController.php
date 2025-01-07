<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\StockManagement;
use App\Models\Tags;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $random;
    protected $sku1;
    protected $sku2;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
        $this->sku1 = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
        $this->sku2 = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(['Superadmin', 'Vendor'])) {
            $products = Product::with('parents')->where('user_id', auth()->user()->id)->get();
            return view('admin.product.index', compact('products'));
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
        if (Gate::any(['Superadmin', 'Vendor'])) {
            $tags = Tags::all();
            $brand = Brand::all();
            $id = auth()->user()->id;
            $vendor = Vendor::where('vendor_id', $id)->first()->vendor_type;
            $categories = Category::where('parent_id', null)->where('vendor_type_id', $vendor)->get();
            $categories_dropdown = "<option selected disabled required> Select Category </option>";
            foreach ($categories as $cat) {
                $categories_dropdown .= "<option value='" . $cat->id . "'>" . $cat->name . " </option>";
                $sub_categories = Category::where(['parent_id' => $cat->id])->where('vendor_type_id', $vendor)->get();
                foreach ($sub_categories as $sub_cat) {
                    $categories_dropdown .= "<option value='" . $sub_cat->id . "'>  &nbsp; &nbsp; ---- " . $sub_cat->name . " </option>";
                }
            }
            return view('admin.product.create', compact('categories_dropdown', 'tags', 'brand'));
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
            'productName' => 'required',
            'category_id' => 'required',
            'stock' => 'numeric|min:0',
            'discountPercent' => 'numeric|min:0|max:100',
            'actualRate' => 'numeric|min:0',
            'sale_price' => 'numeric|min:0',
        ]);
        $products = new Product();
        $products->productName = $request->productName;
        $products->unit = $request->unit;
        $products->category_id = $request->category_id;
        $name = str_replace(' ', '-', $request->productName);
        $products->slug =  'product-' . $name . '-' . $this->random;
        $products->shortDesc = $request->shortDesc;
        $products->description = $request->description;
        $products->stock = $request->stock;
        $products->featured = $request->featured;
        $products->user_id = auth()->user()->id;
        $id = auth()->user()->id;
        $vendor = Vendor::where('vendor_id', $id)->first()->id;
        $products->vendor_id = $vendor;
        $products->discountPercent = $request->discountPercent;
        $products->actualRate = $request->actualRate;
        $products->sale_price = $request->sale_price;
        $products->brand = $request->brand;
        $products->tags = $request->tags;
        $products->have_stock = $request->have_stock;
        $products->sku = $this->sku1 . $this->sku2;
        $products->size = $request->size;
        $products->color = $request->color;
        $products->precaution = $request->precaution;
        $products->side_effect = $request->side_effect;
        $products->how_to_use = $request->how_to_use;
        $products->drug_type = $request->drug_type;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $products->image = $images[0];
                $products->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $products->image = $images[0];
                $products->image_path = $images[1];
            }
        }
        $products->save();
        return redirect()->route('product.index')->with('success', 'Products Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        if (Gate::any(['Superadmin', 'Vendor'])) {
            $tags = Tags::all();
            $brand = Brand::all();
            $product = Product::where('id', $id)->first();
            $categories = Category::where('parent_id', null)->get();
            $categories_dropdown = "<option selected disabled> Select Category </option>";
            foreach ($categories as $cat) {
                $selected = '';
                if ($cat->id === $product->category_id) {
                    $selected = 'selected';
                }
                $categories_dropdown .= "<option value='" . $cat->id . "'" . $selected . ">" . $cat->name . " </option>";
                $sub_categories = Category::where(['parent_id' => $cat->id])->get();
                foreach ($sub_categories as $sub_cat) {
                    $selected = '';
                    if ($sub_cat->id === $product->category_id) {
                        $selected = 'selected';
                    }
                    $categories_dropdown .= "<option value='" . $sub_cat->id . "'" . $selected . ">  &nbsp; &nbsp; ---- " . $sub_cat->name . " </option>";
                }
            }
            return view('admin.product.edit', compact('product', 'categories_dropdown', 'tags', 'brand'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'productName' => 'required',
            'category_id' => 'required',
            'discountPercent' => 'numeric|min:0|max:100',
            'actualRate' => 'numeric|min:0',
            'sale_price' => 'numeric|min:0',
            'shortDesc' => 'required',
        ]);
        $products = Product::findOrFail($id);
        $products->productName = $request->productName;
        $products->unit = $request->unit;
        $products->category_id = $request->category_id;
        $name = str_replace(' ', '-', $request->productName);
        $products->slug =  'product-' . $name . '-' . $this->random;
        $products->shortDesc = $request->shortDesc;
        $products->description = $request->description;
        $products->featured = $request->featured;
        $products->user_id = auth()->user()->id;
        $products->discountPercent = $request->discountPercent;
        $products->actualRate = $request->actualRate;
        $products->sale_price = $request->sale_price;
        $products->brand = $request->brand;
        $products->tags = $request->tags;
        $products->have_stock = $request->have_stock;
        $products->size = $request->size;
        $products->color = $request->color;
        $products->precaution = $request->precaution;
        $products->side_effect = $request->side_effect;
        $products->how_to_use = $request->how_to_use;
        $products->drug_type = $request->drug_type;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $products->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $products->image = $images[0];
                $products->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $products->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $products->image = $images[0];
                $products->image_path = $images[1];
            }
        }
        $products->save();
        return redirect()->route('product.index')->with('success', 'Products Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id)->delete();
        return response()->json($product);
    }

    public function gallery($id)
    {
        // return $request;
        $product = Product::findOrFail($id);
        $gallery = Gallery::where('product_id', $product->id)->get();
        return view('admin.product.multiple', compact('product', 'gallery'));
    }

    public function filestore(Request $request)
    {
        $request->validate(
            [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]
        );
        $product_id = $request->product_id;
        $image = $request->image;
        if (env('STORAGE_TYPE') == 'native') {
            $fileNameExt = $image->getClientOriginalName();
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            $fileExt = $image->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            $image->storeAs('public/images', $fileNameToStore);
            $pathToStore =  asset('storage/images/' . $fileNameToStore);
            $gallery = new Gallery();
            $gallery->product_id = $product_id;
            $gallery->image = $fileNameToStore;
            $gallery->image_path = $pathToStore;
        } else {
            $gallery = new Gallery();
            $gallery->product_id = $product_id;
            $images = storeImageStorage($request, 'image', 'image_path');
            $gallery->image = $images[0];
            $gallery->image_path = $images[1];
        }

        $gallery->save();
        return response()->json(['success' => 'Images Added Successfully']);
    }

    public function destroyImage($id)
    {
        $gallery = Gallery::findOrFail($id);
        $product = Product::findOrFail($gallery->product_id);
        $gallery->delete();
        return redirect()->route('product.gallery', $product->id)->with('success', 'Images Deleted Successfully');
    }

    public function editstock($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.stock', compact('product'));
    }

    public function updatestock(Request $request, $id)
    {
        $request->validate(
            [
                'updated_stock_quantity' => 'numeric|min:1',
            ],
            [
                'updated_stock_quantity.numeric' => "Stock Should Be In Number",
                'updated_stock_quantity.min' => "Stock Should Be Greater Or Equal To 1",
            ]
        );
        $product = Product::findOrFail($id);
        $addstock = new StockManagement();
        $addstock->vendor_id = auth()->user()->id;
        $addstock->product_id = $product->id;
        $addstock->latest_stock_quantity = $product->stock;
        $addstock->updated_stock_quantity = $request->updated_stock_quantity;
        $addstock->total_stock_quantity = $product->stock +  $addstock->updated_stock_quantity;
        $addstock->increase_stock_date = Carbon::now();
        $saved = $addstock->save();
        if ($saved) {
            $product->stock = $product->stock + $addstock->updated_stock_quantity;
            $product->update();
        }
        return redirect()->route('product.index')->with('success', 'Stock Updated Successfully');
    }

    public function stockmanage()
    {
        $product = StockManagement::with('stock_product:id,productName')->where('vendor_id', auth()->user()->id)->get();
        return view('admin.product.stockmanage', compact('product'));
    }
}
