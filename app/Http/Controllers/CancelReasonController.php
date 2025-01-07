<?php

namespace App\Http\Controllers;

use App\Models\CancelReason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CancelReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("17"))) {
            $cancelReason = CancelReason::orderBy('created_at','desc')->get();
            return view('admin.cancelreason.index', compact('cancelReason'));
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
            return view('admin.cancelreason.create');
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
            'cancel_reason' => 'required'
        ]);
        $cancelReason = new CancelReason();
        $cancelReason->cancel_reason = $request->cancel_reason;
        $saved = $cancelReason->save();
        if ($saved) {
            return redirect()->route('cancelreason.index')->with('success', 'Cancel Reason Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CancelReason  $cancelReason
     * @return \Illuminate\Http\Response
     */
    public function show(CancelReason $cancelReason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CancelReason  $cancelReason
     * @return \Illuminate\Http\Response
     */
    public function edit(CancelReason $cancelReason,$id)
    {
        if (Gate::any(checkPermission("17"))) {
            $cancelReason = CancelReason::findOrFail($id);
            return view('admin.cancelreason.edit', compact('cancelReason'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CancelReason  $cancelReason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cancel_reason' => 'required'
        ]);
        $cancelReason = CancelReason::findOrFail($id);
        $cancelReason->cancel_reason = $request->cancel_reason;
        $saved = $cancelReason->save();
        if ($saved) {
            return redirect()->route('cancelreason.index')->with('success', 'Cancel Reason Added Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CancelReason  $cancelReason
     * @return \Illuminate\Http\Response
     */
    public function destroy(CancelReason $cancelReason)
    {
        //
    }
}
