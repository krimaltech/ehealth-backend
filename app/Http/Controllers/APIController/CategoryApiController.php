<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryApiController extends Controller
{
    public function index()
    {
        $category = Category::get();
        return response()->json($category);
    }
    public function vendortype(Request $request)
    {
        $vendor_type_id = $request->vendor_type_id;
        $vendor_id = $request->vendor_id;
        $brand = $request->brand;
        if ($brand) {
            $categories = DB::table('categories')
                ->join('products', 'categories.id', '=', 'products.category_id')
                ->select('categories.*', 'products.brand')
                ->when($vendor_type_id, function ($q) use ($vendor_type_id) {
                    return $q->where('vendor_type_id', $vendor_type_id);
                })
                ->when($vendor_id, function ($q) use ($vendor_id) {
                    return $q->where('categories.vendor_id', $vendor_id);
                })
                ->when($brand, function ($q) use ($brand) {
                    return $q->where('brand', $brand);
                })
                ->get();
        } else {
            $categories = DB::table('categories')
                ->when($vendor_type_id, function ($q) use ($vendor_type_id) {
                    return $q->where('vendor_type_id', $vendor_type_id);
                })
                ->when($vendor_id, function ($q) use ($vendor_id) {
                    return $q->where('categories.vendor_id', $vendor_id);
                })
                ->get();
        }

        return response()->json($categories);
    }
}
