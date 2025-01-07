<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingApiController extends Controller
{
    public function index()
    {
        $shipping = Shipping::all();
        return response()->json($shipping);
    }
}
