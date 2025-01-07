<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DriverController extends Controller
{
    protected $random;

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
        if (Gate::any(checkPermission("27"))) {
            $drivers = Driver::with('driver')->where('driver_id', auth()->user()->id)->get();
            return view('admin.driver.index', compact('drivers'));
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
        if (Gate::any(checkPermission("27"))) {
            return view('admin.driver.create');
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
            'address' => 'required',
            // 'driver_id' => 'required|driver_id|unique:drivers,driver_id,',
        ]);
        $driver = new Driver();
        $driver->driver_id = auth()->user()->id;
        $driver->slug = 'Driver' . $this->random;
        $driver->address = $request->address;
        $driver->salary = $request->salary;
        $driver->latitude = $request->latitude;
        $driver->longitude = $request->longitude;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $driver->image = $images[0];
                $driver->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $driver->image = $images[0];
                $driver->image_path = $images[1];
            }
        }
        $saved = $driver->save();

        return redirect()->route('driver.index')->with('success', 'driver Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::any(checkPermission("27"))) {
            $driver = Driver::find($id);
            return view('admin.driver.edit', compact('driver'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);



        $driver =  Driver::find($id);
        $driver->address = $request->address;
        $driver->salary = $request->salary;
        $saved = $driver->save();

        $user = User::find($driver->driver_id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();
        if ($saved) {
            return redirect()->route('driver.index')->with('success', 'driver Added Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::any(checkPermission("27"))) {
            $driver = Driver::find($id);
            $driver->delete();
            return redirect()->route('driver.index')->with('success', 'driver deleted Successfully.');
        } else {
            return view('viewnotfound');
        }
    }
}
