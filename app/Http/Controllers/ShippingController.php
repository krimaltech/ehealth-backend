<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("17"))) {
            $shipping = Shipping::all();
            return view('admin.shipping.index',compact('shipping'));
        }
        else {
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
            return view('admin.shipping.create');
        }
        else {
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
        $shipping = new Shipping();
        $shipping->shipping_type = $request->shipping_type;
        $shipping->price = $request->price;
        $shipping->maximum = $request->maximum;
        $shipping->minimum = $request->minimum;
        $shipping->status = $request->status;
        $shipping->save();
        return redirect()->route('shipping.index')->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::any(checkPermission("17"))) {
            $shipping = Shipping::findOrFail($id);
            return view('admin.shipping.edit',compact('shipping'));
        }
        else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shipping = Shipping::findOrFail($id);
        $shipping->shipping_type = $request->shipping_type;
        $shipping->maximum = $request->maximum;
        $shipping->minimum = $request->minimum;
        $shipping->price = $request->price;
        $shipping->status = $request->status;
        $shipping->save();
        return redirect()->route('shipping.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        //
    }
}
