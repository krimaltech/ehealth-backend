<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Member;
use App\Models\Product;
use App\Models\Review;
use App\Models\SearchHistory;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductApiController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }
    public function index(Request $request)
    {

        // try {
            $category_id = $request->category_id;
            $keyword = $request->keyword;
            $min_price = $request->min_price;
            $max_price = $request->max_price;
            $brand = $request->brand;
            $vendor_id = $request->vendor_id;
            $sort = $request->sort;
            $rating = $request->rating;
            $latest = $request->latest;
            $slug = $request->slug;
            $is_exclusive = $request->is_exclusive;
            $vendor_type = $request->vendor_type;
            $latest_views = $request->latest_views;
            $highest_views = $request->highest_views;

            if ($slug) {
                $newitem = Product::where('slug', $slug)->first();
                if ($newitem) {
                    $newitem->views = $newitem->views + 1;
                    $newitem->update();
                }
            }
            if ($keyword) {
                $searchHistory = new SearchHistory();
                $searchHistory->user_id = $request->user_id;
                $searchHistory->query = $keyword;
                $searchHistory->type = $request->type;
                $searchHistory->save();
            }

            $query = Product::where('featured', 1)->with('gallery:product_id,image_path', 'vendor_details', 'brand_detail')->when($category_id, function ($q) use ($category_id) {
                return $q->where('category_id', $category_id);
            })
                ->when($keyword, function ($q) use ($keyword) {
                    return $q->where('productName', 'LIKE', '%' . $keyword . '%');
                })
                ->when($min_price && $max_price, function ($q) use ($min_price, $max_price) {
                    return $q->whereBetween('sale_price', [$min_price, $max_price]);
                })
                ->when($brand, function ($q) use ($brand) {
                    return $q->where('brand', $brand);
                })
                ->when($vendor_id, function ($q) use ($vendor_id) {
                    return $q->where('vendor_id', $vendor_id);
                })
                ->when($sort, function ($q) use ($sort) {
                    return $q->orderBy('sale_price', $sort);
                })
                ->when($latest, function ($q) use ($latest) {
                    return $q->orderBy('created_at', $latest);
                })
                //latest views
                ->when($latest_views, function ($q) use ($latest_views) {
                    return $q->orderBy('updated_at', $latest_views);
                })
                //Highest views
                ->when($highest_views, function ($q) use ($highest_views) {
                    return $q->orderBy('views', $highest_views);
                })
                ->when($slug, function ($q) use ($slug) {
                    return $q->where('slug', $slug);
                })
                ->when($is_exclusive, function ($q) use ($is_exclusive) {
                    $q->whereHas('vendor_details', function ($q) use ($is_exclusive) {
                        return $q->where('is_exculsive', $is_exclusive);
                    });
                })
                ->when($rating, function ($q) use ($rating) {
                    return $q->where('averageRating', '>=', $rating);
                })
                ->when($vendor_type, function ($q) use ($vendor_type) {
                    return $q->join('vendors', 'vendors.id', '=', 'products.vendor_id')->select('products.*', 'vendors.vendor_type')->where('vendor_type', $vendor_type);
                })
                ->Paginate(12)->withQueryString();



            // if ($limit = $request->limit) {
            //     $product = Product::orderBy('created_at', 'asc')->limit($limit)->get();
            // }
            // if ($request->category_id && $limit = $request->limit) {
            //     $product = Product::where('category_id', $request->category_id)->inRandomOrder()->limit($limit)->get();
            // }

            return response()->json($query);
        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'message' => 'Server Error'
        //     ]);
        // }
    }

    public function checkStock(Request $request)
    {
        try {
            $limit = $request->limit;
            $list = $request->list;
            $query = Product::select('id', 'stock')->whereIn('id', $list)->limit($limit)->get();
            return response()->json($query);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Server Error'
            ]);
        }
    }

    public function get_review(Request $request)
    {
        $product_id = $request->product_id;
        $review = Review::select('user_id', 'product_id', 'rating', 'comment', 'updated_at')->with('member.user')->where('product_id', $product_id)->get();
        return response()->json($review);
    }

    public function product_review(Request $request)
    {
        $review = new Review();
        $id = auth()->user()->id;
        $user_id = Member::where('member_id', $id)->first()->id;
        $review->user_id = $user_id;
        $review->product_id = $request->product_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->status = 0;
        $review->save();
        $product = Product::find($request->product_id);
        $rating_review = Review::groupBy('product_id')->select(DB::raw('AVG(rating) as ratings'))->where('product_id', $request->product_id)->first();
        $product->averageRating = $rating_review->ratings;
        $reviews = Review::groupBy('product_id')->select(DB::raw('count(rating) as count'))->where('product_id', $request->product_id)->first();
        $product->totalReviews = $reviews->count;
        $product->save();
        return response()->json(['message' => 'success']);
    }

    public function brand()
    {
        $brand = Brand::select('id', 'brand_name', 'image_path')->get();
        return response()->json($brand);
    }

    public function rating_average(Request $request)
    {
        $product_id = $request->product_id;
        $rating_review = Review::groupBy('product_id')->select(DB::raw('count(rating) as count'))->where('product_id', $product_id)->first();
        return response()->json($rating_review);
    }

    public function rating_onebyone(Request $request)
    {
        $product_id = $request->product_id;
        $rating_review = Review::select('rating', DB::raw('count(*) as total'))
            ->groupBy('rating')
            ->where('product_id', $product_id)
            ->get();
        return response()->json($rating_review);
    }

    public function store(Request $request)
    {
        $request->validate([
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
        $products->sku = $request->sku;
        if ($request->image) {
            $image = $request->image;
            if(env('STORAGE_TYPE') == 'minio'){
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath); 
                $products->image_path = $imageUpload['path'];
                $products->image = $imageUpload['file'];
            }else{
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image,$folderPath);                    
                $products->image_path = $imageUpload['path'];
                $products->image = $imageUpload['file'];
            }
        }
        $products->save();
        return response()->json(['message' => 'success Products Saved Successfully']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'stock' => 'numeric|min:0',
            'discountPercent' => 'numeric|min:0|max:100',
            'actualRate' => 'numeric|min:0',
            'sale_price' => 'numeric|min:0',
        ]);
        $products = Product::findOrFail($id);
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
        $products->discountPercent = $request->discountPercent;
        $products->actualRate = $request->actualRate;
        $products->sale_price = $request->sale_price;
        $products->brand = $request->brand;
        $products->tags = $request->tags;
        $products->have_stock = $request->have_stock;
        $products->sku = $request->sku;
        if ($request->image) {
            $image = $request->image;
            if(env('STORAGE_TYPE') == 'minio'){
                Storage::disk('minio')->delete('images/'.$products->image);
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath); 
                $products->image_path = $imageUpload['path'];
                $products->image = $imageUpload['file'];
            }else{
                $deleteDestinationPath = 'public/images/' . $products->image;
                if (Storage::exists($deleteDestinationPath)) {
                    Storage::delete($deleteDestinationPath);
                }
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image,$folderPath);                    
                $products->image_path = $imageUpload['path'];
                $products->image = $imageUpload['file'];
            }
        }
        $products->save();
        return response()->json(['message' => 'success Products Updated Successfully']);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id)->delete();
        return response()->json(['message' => 'success Products Deleted Successfully']);
    }

    public function search_history(Request $request)
    {
        $searchHistory = SearchHistory::where('type',$request->type)->where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();
        return response()->json($searchHistory);
    }

    public function remove_history($id)
    {
        SearchHistory::findOrFail($id)->delete();
        return response()->json(['message' => 'Suggestions Removed']);
    }

    public function clear_history(Request $request)
    {
        $ids = explode(",", $request->id);
        SearchHistory::whereIn('id',$ids)->delete();
        return response()->json(['message' => 'Search History Cleared']);
    }
}
