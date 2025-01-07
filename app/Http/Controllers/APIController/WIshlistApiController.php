<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WIshlistApiController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::with('product')->where("user_id", Auth::user()->id)->get();
        return response()->json(
            $wishlist
        );
    }

    public function addToWishlist(Request $request)
    {
        try {
            $wishlist = new Wishlist;
            $wishlist->user_id = auth()->user()->id;
            $wishlist->product_id = $request->product_id;
            $wishlist->status = 'like';
            $wishlist->save();
            return response()->json(['message' => 'success']);
        } catch (\Throwable $th) {
            return response(['message' => 'error']);
        }
    }
    public function wishlistDelete($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['message' => 'success']);
        }
    }
    public function allWishlistDelete()
    {
        $wishlist = Wishlist::where('user_id',auth()->user()->id)->get();
        if ($wishlist) {
            $wishlist->each->delete();
            return response()->json(
                ['message' => 'success']
            );
        }
    }
    public function store()
    {
        $user_id = Auth::user()->id;
        return $user_id;
    }
}
