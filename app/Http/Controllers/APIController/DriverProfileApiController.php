<?php

namespace App\Http\Controllers\ApiController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DriverProfileApiController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'address' => 'required',
            ]);
            $driver = new Driver();
            $driver->driver_id = auth()->user()->id;
            $driver->slug = 'Driver' . $this->random;
            $driver->address = $request->address;
            $driver->salary = $request->salary;
            $driver->latitude = $request->latitude;
            $driver->longitude = $request->longitude;
            if ($request->image) {
                $image = $request->image;
                if(env('STORAGE_TYPE') == 'minio'){
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($image, $destinationPath); 
                    $driver->image_path = $imageUpload['path'];
                    $driver->image = $imageUpload['file'];
                }else{
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($image,$folderPath);                    
                    $driver->image_path = $imageUpload['path'];
                    $driver->image = $imageUpload['file'];
                }
            }
            if ($request->file) {
                $imagefile = $request->file;
                if(env('STORAGE_TYPE') == 'minio'){
                    $destinationPath = 'images/';
                    $fileUpload = Helper::minio_upload($imagefile, $destinationPath); 
                    $driver->file_path = $fileUpload['path'];
                    $driver->file = $fileUpload['file'];
                }else{
                    $folderPath = "storage/images/"; //path location                
                    $fileUpload = Helper::native_upload($imagefile,$folderPath);                    
                    $driver->file_path = $fileUpload['path'];
                    $driver->file = $fileUpload['file'];
                }
            }
            $driver->slug =  'driver-' . $this->random;
            if (Driver::where('driver_id', '=', auth()->user()->id)->exists()) {
                return response()->json(['error' => "You have already filled a form"],400);
             }
            $saved = $driver->save();


            if ($saved) {
                return response()->json([
                    "status" => "true"
                ], 200);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }
    }
}
