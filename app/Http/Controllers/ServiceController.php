<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
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
        if (Gate::any(['Superadmin', 'Admin'])) {
            $services = Service::all();
            return view('admin.service.index', compact('services'));
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
        if (Gate::any(['Superadmin', 'Admin'])) {
            return view('admin.service.create');
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
        //return $request;
        $request->validate([
            'service_name' => 'required',
            'description' => 'required',
            // 'price' => 'required',
            'image' => 'required',
            'test_result_type' => 'required',
        ]);
        $service = new Service();
        $service->service_name = $request->service_name;
        $service->description = $request->description;
        $service->price = $request->price;
        $name = str_replace(' ', '-', $request->service_name);
        $service->slug =  'service-' . $name . '-' . $this->random;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $service->image = $images[0];
                $service->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $service->image = $images[0];
                $service->image_path = $images[1];
            }
        }
        $service->test_result_type = $request->test_result_type;
        $saved  = $service->save();
        if ($request->test_result_type == 'Range') {
            $count = count($request->tests);
            for ($i = 0; $i < $count; $i++) {
                $test = new Test();
                $test->service_id = $service->id;
                $test->tests = $request->tests[$i];
                $test->male_min_range = $request->male_min_range[$i];
                $test->male_max_range = $request->male_max_range[$i];
                $test->female_min_range = $request->female_min_range[$i];
                $test->female_max_range = $request->female_max_range[$i];
                $test->child_min_range = $request->child_min_range[$i];
                $test->child_max_range = $request->child_max_range[$i];
                $test->male_amber_min_range = $request->male_amber_min_range[$i];
                $test->male_amber_max_range = $request->male_amber_max_range[$i];
                $test->female_amber_min_range = $request->female_amber_min_range[$i];
                $test->female_amber_max_range = $request->female_amber_max_range[$i];
                $test->child_amber_min_range = $request->child_amber_min_range[$i];
                $test->child_amber_max_range = $request->child_amber_max_range[$i];
                $test->male_red_min_range = $request->male_red_min_range[$i];
                $test->male_red_max_range = $request->male_red_max_range[$i];
                $test->female_red_min_range = $request->female_red_min_range[$i];
                $test->female_red_max_range = $request->female_red_max_range[$i];
                $test->child_red_min_range = $request->child_red_min_range[$i];
                $test->child_red_max_range = $request->child_red_max_range[$i];
                $test->unit = $request->unit[$i];
                $test->price = $request->range_price[$i];
                $saved = $test->save();
            }
        } else if ($request->test_result_type == 'Value') {
            $count = count($request->values);
            for ($i = 0; $i < $count; $i++) {
                $test = new Test();
                $test->service_id = $service->id;
                $test->tests = $request->values[$i];
                $saved = $test->save();
            }
        } else if ($request->test_result_type == 'Value and Image') {
            if ($request->testvalues != [null]) {
                $count = count($request->testvalues);
                for ($i = 0; $i < $count; $i++) {
                    $test = new Test();
                    $test->service_id = $service->id;
                    $test->tests = $request->testvalues[$i];
                    $saved = $test->save();
                }
            }
        }
        if ($saved) {
            return redirect()->route('service.index')->with('success', 'Service Added Successfully');
        }

        // if($request->tests != [null]){
        //     $count = count($request->tests);
        //     for($i = 0; $i < $count ; $i++){
        //         $test = new Test();
        //         $test->service_id = $service->id;
        //         $test->tests = $request->tests[$i];
        //         $test->male_min_range = $request->male_min_range[$i];
        //         $test->male_max_range = $request->male_max_range[$i];
        //         $test->female_min_range = $request->female_min_range[$i];
        //         $test->female_max_range = $request->female_max_range[$i];
        //         $test->child_min_range = $request->child_min_range[$i];
        //         $test->child_max_range = $request->child_max_range[$i];
        //         $test->unit = $request->unit[$i];
        //         $saved = $test->save();
        //     }  
        // }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $service = Service::where('slug', $slug)->first();
            $tests = Test::where('service_id', $service->id)->get();
            return view('admin.service.show', compact('service', 'tests'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $service = Service::where('slug', $slug)->first();
            return view('admin.service.edit', compact('service'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'service_name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $service = Service::where('slug', $slug)->first();
        $service->service_name = $request->service_name;
        $service->description = $request->description;
        $service->price = $request->price;
        $name = str_replace(' ', '-', $request->service_name);
        $service->slug =  'service-' . $name . '-' . $this->random;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $service->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $service->image = $images[0];
                $service->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $service->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $service->image = $images[0];
                $service->image_path = $images[1];
            }
        }
        $saved  = $service->save();
        if ($saved) {
            return redirect()->route('service.index')->with('success', 'Service Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
