<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Vendor;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids = auth()->user()->id;
        $vendor_id = Vendor::where("vendor_id",$ids)->first()->id;
        $order = OrderProduct::with('orders','products')->where('vendor_id',$vendor_id)->get();
        return view('admin.order.index',compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderProduct  $orderDetails
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = OrderProduct::with('orders.user','products')->findOrFail($id);
        return view('admin.order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDetails  $orderDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderProduct $orderDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDetails  $orderDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderProduct $orderDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetails  $orderDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderProduct $orderDetails)
    {
        //
    }
}
