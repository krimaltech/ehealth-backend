<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Member;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\VendorAdvertisement;
use App\Models\VendorFollower;
use App\Models\VendorReview;
use App\Models\VendorType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorTypeApiController extends Controller
{
    public function index()
    {
        $type = VendorType::with('category')->get();
        return response()->json($type);
    }

    public function vendor_details(Request $request)
    {

        $vendor_type = $request->vendor_type;
        $slug = $request->slug;
        $details = Vendor::with('user')->when($vendor_type, function ($q) use ($vendor_type) {
            return $q->where('vendor_type', $vendor_type);
        })
            ->when($slug, function ($q) use ($slug) {
                return $q->where('slug', $slug);
            })
            ->get();
        return response()->json($details);
    }

    public function get_review(Request $request)
    {
        $vendor_id = $request->vendor_id;
        $vendorReview = VendorReview::with('user')->where('vendor_id', $vendor_id)->get();
        return response()->json($vendorReview);
    }

    public function vendor_review(Request $request)
    {
        // return auth()->user()->id;
        // return 'vendor review';
        $review = new VendorReview();
        $id = auth()->user()->id;
        $user_id = Member::where('member_id', $id)->first()->id;
        $review->user_id = $user_id;
        $review->vendor_id = $request->vendor_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->status = 0;
        $review->save();
        $vendor = Vendor::find($request->vendor_id);
        $rating_review = VendorReview::groupBy('vendor_id')->select(DB::raw('AVG(rating) as ratings'))->where('vendor_id', $request->vendor_id)->first();
        $vendor->averageRating = $rating_review->ratings;
        $vendor->save();
        return response()->json(['message' => 'success']);
    }

    public function vendor_follower(Request $request)
    {

        $result = VendorFollower::where('user_id', Auth()->user()->id)->where('vendor_id', $request->vendor_id)->first();
        if ($result) {
            $vendorFollower = VendorFollower::where('user_id', Auth()->user()->id)->where('vendor_id', $request->vendor_id)->first();
            $vendorFollower->status == 1 ? $vendorFollower->status = 0 : $vendorFollower->status = 1;

            $vendorFollower->save();
        } else {
            $vendorFollower = new VendorFollower();
            $vendorFollower->user_id = Auth()->user()->id;
            $vendorFollower->vendor_id = $request->vendor_id;
            $vendorFollower->status = 1;
            $vendorFollower->save();
        }
        $vendor = Vendor::find($request->vendor_id);
        $vendor->follower_count = VendorFollower::where('vendor_id', $request->vendor_id)->where('status', 1)->count();
        $vendor->save();
        return response()->json(['message' => 'success']);
    }

    public function followerCount(Request $request)
    {
        $count = VendorFollower::where('vendor_id', $request->vendor_id)->where('status', 1)->count();
        return response()->json(['followerCount' => $count]);
    }

    public function isFollowed(Request $request)
    {
        $result = VendorFollower::where('vendor_id', $request->vendor_id)->where('user_id', Auth()->user()->id)->where('status', 1)->count();
        return response()->json(['isfollowed' => $result]);
    }

    public function exclusive_vendor()
    {
       $vendors = Vendor::where('is_exculsive',2)->with('user')->get();
        return response()->json($vendors);
    }
    public function exclusive_advertisement()
    {
       $vendors = VendorAdvertisement::where('user_id',auth()->user()->id)->get();
        return response()->json($vendors);
    }
    //get brands by vendor
    public function get_vendor_by_slug($slug)
    {
       $vendor = Vendor::where('slug',$slug)->first();
       $brands=[];
       if($vendor){
        $products= Product::where('vendor_id',$vendor->id)->pluck('brand');
       
        $brands= Brand::whereIn('id',$products)->get();
       }
    //   return $brands;
        return response()->json($brands);
    }
//get category by vendor
    public function get_category_by_vendor($slug)
    {
       $vendor = Vendor::where('slug',$slug)->first();
       $categories=[];
       if($vendor){
        $products= Product::where('vendor_id',$vendor->id)->pluck('category_id');
        $categories= Category::whereIn('id',$products)->get();
       }
    //   return $categories;
        return response()->json($categories);
    }

   
}