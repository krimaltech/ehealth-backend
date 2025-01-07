<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Tags;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorAgreement;
use App\Models\VendorSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VendorSliderApiController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }

    public function index(Request $request)
    {
        $vendor_id = $request->vendor_id;
        $slider = VendorSlider::where('vendor_id', $vendor_id)->with('vendor')->get();
        return response()->json($slider);
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner_title' => 'required',
            'banner_body' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ]);
        $banner = new VendorSlider();
        $banner->banner_title = $request->banner_title;
        $banner->banner_body = $request->banner_body;
        $vendor_id = Vendor::where('vendor_id', Auth::user()->id)->first();
        $banner->vendor_id = $vendor_id->id;
        if ($request->image) {
            $image = $request->image;
            if(env('STORAGE_TYPE') == 'minio'){
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath); 
                $banner->image_path = $imageUpload['path'];
                $banner->image = $imageUpload['file'];
            }else{
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image,$folderPath);                    
                $banner->image_path = $imageUpload['path'];
                $banner->image = $imageUpload['file'];
            }
        }
        $title = str_replace(' ', '-', $request->banner_title);
        $banner->slug = 'slider-' . $title . '-' . $this->random;
        $saved = $banner->save();
        if ($saved) {
            return response()->json(['message' => 'successfully stored']);
        }
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'banner_title' => 'required',
            'banner_body' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif',
        ]);
        $banner = VendorSlider::where('slug', $slug)->first();
        $banner->banner_title = $request->banner_title;
        $banner->banner_body = $request->banner_body;
        if ($request->image) {
            $image = $request->image;
            if(env('STORAGE_TYPE') == 'minio'){
                Storage::disk('minio')->delete('images/'.$banner->image);
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath); 
                $banner->image_path = $imageUpload['path'];
                $banner->image = $imageUpload['file'];
            }else{
                $deleteDestinationPath = 'public/images/' . $banner->image;
                if (Storage::exists($deleteDestinationPath)) {
                    Storage::delete($deleteDestinationPath);
                }
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image,$folderPath);                    
                $banner->image_path = $imageUpload['path'];
                $banner->image = $imageUpload['file'];
            }
        }
        $title = str_replace(' ', '-', $request->banner_title);
        $banner->slug = 'slider-' . $title . '-' . $this->random;
        $saved = $banner->save();
        if ($saved) {
            return response()->json(['message' => 'successfully updated']);
        }
    }

    public function tagsIndex()
    {
        $tags = Tags::all();
        return response()->json($tags);
    }

    public function tagsStore(Request $request)
    {
        $tags = new Tags();
        $tags->tag_name = $request->tag_name;
        $tags->save();
        return response()->json(['message' => 'successfully tags added']);
    }

    public function tagsUpdate(Request $request, $id)
    {
        $tags = Tags::findOrFail($id);
        $tags->tag_name = $request->tag_name;
        $tags->save();
        return response()->json(['message' => 'successfully tags updated']);
    }

    public function tagsDestroy($id)
    {
        $tags = Tags::findOrFail($id);
        $tags->delete();
        return response()->json(['message' => 'successfully tags deleted']);
    }

    public function BrandIndex()
    {
        $brands = Brand::all();
        return response()->json($brands);
    }

    public function BrandStore(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
        ]);
        $brands = new Brand();
        $brands->brand_name = $request->brand_name;
        if ($request->image) {
            $image = $request->image;
            if(env('STORAGE_TYPE') == 'minio'){
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath); 
                $brands->image_path = $imageUpload['path'];
                $brands->image = $imageUpload['file'];
            }else{
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image,$folderPath);                    
                $brands->image_path = $imageUpload['path'];
                $brands->image = $imageUpload['file'];
            };
        }
        $brands->save();
        return response()->json(['message' => 'Brand successfully added']);
    }

    public function BrandUpdate(Request $request, $id)
    {
        $request->validate([
            'brand_name' => 'required',
        ]);
        $brands = Brand::findOrFail($id);
        $brands->brand_name = $request->brand_name;
        if ($request->image) {
            $image = $request->image;
            if(env('STORAGE_TYPE') == 'minio'){
                Storage::disk('minio')->delete('images/'.$brands->image);
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath); 
                $brands->image_path = $imageUpload['path'];
                $brands->image = $imageUpload['file'];
            }else{
                $deleteDestinationPath = 'public/images/' . $brands->image;
                if (Storage::exists($deleteDestinationPath)) {
                    Storage::delete($deleteDestinationPath);
                }
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image,$folderPath);                    
                $brands->image_path = $imageUpload['path'];
                $brands->image = $imageUpload['file'];
            }
        }
        $brands->save();
        return response()->json(['message' => 'Brand successfully updated']);
    }

    public function BrandDestroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return response()->json(['message' => 'Brand successfully deleted']);
    }

    public function vendor_profile()
    {
        $vendorProfile = Vendor::where('vendor_id', Auth::user()->id)->with(['types','user.kyc'])->first();
        return response()->json($vendorProfile);
    }

    public function vendor_profile_store(Request $request)
    {
        $request->validate([
           
            'address' => 'required',
            'store_name' => 'required',
            'vendor_type' => 'required',
        ]);
        $vendor = new Vendor();
        $vendor->vendor_id = auth()->user()->id;
        $vendor->store_name = $request->store_name;
        $vendor->vendor_type = $request->vendor_type;
        $vendor->address = $request->address;
        if ($request->image) {
            $image = $request->image;
            if(env('STORAGE_TYPE') == 'minio'){
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath); 
                $vendor->image_path = $imageUpload['path'];
                $vendor->image = $imageUpload['file'];
            }else{
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image,$folderPath);                    
                $vendor->image_path = $imageUpload['path'];
                $vendor->image = $imageUpload['file'];
            }
        }
        if ($request->file) {
            $imagefile = $request->file;
            if(env('STORAGE_TYPE') == 'minio'){
                $destinationPath = 'images/';
                $fileUpload = Helper::minio_upload($imagefile, $destinationPath); 
                $vendor->file_path = $fileUpload['path'];
                $vendor->file = $fileUpload['file'];
            }else{
                $folderPath = "storage/images/"; //path location                
                $fileUpload = Helper::native_upload($imagefile,$folderPath);                    
                $vendor->file_path = $fileUpload['path'];
                $vendor->file = $fileUpload['file'];
            }
        }
        if ($request->tax) {
            $imagefile = $request->tax;
            if(env('STORAGE_TYPE') == 'minio'){
                $destinationPath = 'images/';
                $fileUpload = Helper::minio_upload($imagefile, $destinationPath); 
                $vendor->tax_path = $fileUpload['path'];
                $vendor->tax = $fileUpload['file'];
            }else{
                $folderPath = "storage/images/"; //path location                
                $fileUpload = Helper::native_upload($imagefile,$folderPath);                    
                $vendor->tax_path = $fileUpload['path'];
                $vendor->tax = $fileUpload['file'];
            }
        }
        if ($request->ird) {
            $imagefile = $request->ird;
            if(env('STORAGE_TYPE') == 'minio'){
                $destinationPath = 'images/';
                $fileUpload = Helper::minio_upload($imagefile, $destinationPath); 
                $vendor->ird_path = $fileUpload['path'];
                $vendor->ird = $fileUpload['file'];
            }else{
                $folderPath = "storage/images/"; //path location                
                $fileUpload = Helper::native_upload($imagefile,$folderPath);                    
                $vendor->ird_path = $fileUpload['path'];
                $vendor->ird = $fileUpload['file'];
            }
        }
        $vendor->slug =  'vendor-' . $this->random;
        if (Vendor::where('vendor_id', '=', auth()->user()->id)->exists()) {
            return response()->json(['error' => "You have already filled a form"],400);
        }
        $saved = $vendor->save();
        
        $details = new VendorAgreement();
        $details->vendor_id = $vendor->id;
        $details->registration_no = $request->registration_no;
        $details->company_contact = $request->company_contact;
        $details->guarantor_name = $request->guarantor_name;
        $details->guarantor_address = $request->guarantor_address;
        $details->guarantor_contact = $request->guarantor_contact;
        $details->nominator_name = $request->nominator_name;
        $details->nominator_address = $request->nominator_address;
        $details->nominator_contact = $request->nominator_contact;
        $details->membership_time_frame = $request->membership_time_frame;
        $details->membership_fee = $request->membership_fee;
        $details->payment_time_frame = $request->payment_time_frame;
        $details->termination_time_frame = $request->termination_time_frame;
        $details->save();
        
        if ($saved) {
            return response()->json(['message' => 'Vendor-Profile successfully added']);
        }
    }

    public function vendor_profile_update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $vendor = Vendor::where('slug', $slug)->first();
        $vendor->address = $request->address;
        if ($request->image) {
            $image = $request->image;
            if(env('STORAGE_TYPE') == 'minio'){
                Storage::disk('minio')->delete('images/'.$vendor->image);
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath); 
                $vendor->image_path = $imageUpload['path'];
                $vendor->image = $imageUpload['file'];
            }else{
                $deleteDestinationPath = 'public/images/' . $vendor->image;
                if (Storage::exists($deleteDestinationPath)) {
                    Storage::delete($deleteDestinationPath);
                }
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image,$folderPath);                    
                $vendor->image_path = $imageUpload['path'];
                $vendor->image = $imageUpload['file'];
            }
        }
        $name = str_replace(' ', '-', $request->name);
        $vendor->slug =  'vendor-' . $name . '-' . $this->random;
        $saved = $vendor->save();

        $user = User::find($vendor->vendor_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $saved = $user->save();
        if ($saved) {
            return response()->json(['message' => 'Vendor-Profile successfully updated']);
        }
    }
}