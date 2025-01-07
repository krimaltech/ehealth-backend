<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\UploadPrescription;
use Illuminate\Http\Request;

class UpdatedMedicalHistoryController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }
    public function getPrescription()
    {
        $prescription = UploadPrescription::with('user')->where('user_id',auth()->user()->id)->get();
        return response()->json($prescription);
    }

    public function uploadPrescription(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required',
            'title' => 'required',
            'image' => 'required',
        ]);
        $pricing = new UploadPrescription();
        $pricing->user_id = auth()->user()->id;
        $pricing->vendor_id = $request->vendor_id;
        $pricing->title = $request->title;
        if ($request->image) {
            $image = $request->image;
            if(env('STORAGE_TYPE') == 'minio'){
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath); 
                $pricing->image_path = $imageUpload['path'];
                $pricing->image = $imageUpload['file'];
            }else{
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image,$folderPath);                    
                $pricing->image_path = $imageUpload['path'];
                $pricing->image = $imageUpload['file'];
            }
        }
        $pricing->save();
        return response()->json(["message" => "Pescription Added Sucessfully"]);
    }
}
