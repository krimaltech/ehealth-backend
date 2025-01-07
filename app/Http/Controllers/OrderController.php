<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm()
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $order = Order::with('products','shipping')->orderBy('created_at', 'desc')->get();
            return view('admin.order.confirm',compact('order'));
        } else {

            return view('viewnotfound');
        }
    }

    public function details($id)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $order = Order::with('products','shipping')->findOrFail($id);
            return view('admin.order.details',compact('order'));
        } else {

            return view('viewnotfound');
        }
    }

    public function confirmed($id)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $order = Order::findOrFail($id);
            $order->status = 'confirmed';
            $order->update();
            return redirect()->back()->with('success','Order is Confirmed');
        } else {

            return view('viewnotfound');
        }
    }

    public function invoice($id)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $order = Order::with('products','shipping')->findOrFail($id);
            return view('admin.order.invoice',compact('order'));
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
