<?php

namespace App\Http\Controllers;

use App\Models\BookingNotification;
use App\Models\ExpoAndEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ExpoAndEventController extends Controller
{
    public $random;
    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("16"))) {
            $expo = ExpoAndEvent::all();
            return view('admin.expoandevents.index', compact('expo'));
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
        if (Gate::any(checkPermission("16"))) {
            return view('admin.expoandevents.create');
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
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'address' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $expo = new ExpoAndEvent();
        $expo->title = $request->title;
        $expo->start_date = $request->start_date;
        $expo->end_date = $request->end_date;
        $expo->address = $request->address;
        $expo->description = $request->description;
        $expo->latitude = $request->latitude;
        $expo->longitude = $request->longitude;
        $expo->priority = $request->priority ? 1 : 0;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $expo->image = $images[0];
                $expo->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $expo->image = $images[0];
                $expo->image_path = $images[1];
            }
        }
        $name = str_replace(' ', '-', $request->name);
        $expo->slug =  'expo-' . $name . '-' . $this->random;
        $saved = $expo->save();

        if ($request->priority) {
            $bookingNotification = new BookingNotification();
            $bookingNotification->user_id = Auth::user()->id;
            $bookingNotification->image = $expo->image_path;
            $bookingNotification->title = "Expo and Event Notification";
            $bookingNotification->body = $expo->title;
            $bookingNotification->type = "Expo and Event";
            $bookingNotification->save();
        }
        if ($saved) {
            return redirect()->route('expo.index')->with('success', 'Expo and Events Added Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpoAndEvent  $expoAndEvent
     * @return \Illuminate\Http\Response
     */
    public function show(ExpoAndEvent $expoAndEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpoAndEvent  $expoAndEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpoAndEvent $expoAndEvent, $id)
    {
        if (Gate::any(checkPermission("16"))) {
            $expo = ExpoAndEvent::findOrFail($id);
            return view('admin.expoandevents.edit', compact('expo'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpoAndEvent  $expoAndEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'address' => 'required',
            'description' => 'required',
        ]);
        $expo = ExpoAndEvent::findOrFail($id);
        $expo->title = $request->title;
        $expo->start_date = $request->start_date;
        $expo->end_date = $request->end_date;
        $expo->address = $request->address;
        $expo->description = $request->description;
        $expo->latitude = $request->latitude;
        $expo->longitude = $request->longitude;
        $expo->priority = $request->priority ? 1 : 0;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $expo->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $expo->image = $images[0];
                $expo->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $expo->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $expo->image = $images[0];
                $expo->image_path = $images[1];
            }
        }
        $name = str_replace(' ', '-', $request->name);
        $expo->slug =  'expo-' . $name . '-' . $this->random;
        $saved = $expo->save();

        if ($request->priority) {
            $bookingNotification = new BookingNotification();
            $bookingNotification->user_id = Auth::user()->id;
            $bookingNotification->image = $expo->image_path;
            $bookingNotification->title = "Expo and Event Notification Updated";
            $bookingNotification->body = $expo->title;
            $bookingNotification->type = "Expo and Event";
            $bookingNotification->save();
        }
        if ($saved) {
            return redirect()->route('expo.index')->with('success', 'Expo and Events Added Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpoAndEvent  $expoAndEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpoAndEvent $expoAndEvent)
    {
        //
    }
}
