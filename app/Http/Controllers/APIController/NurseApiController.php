<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\BookingNotification;
use App\Models\Member;
use App\Models\Nurse;
use App\Models\NurseBooking;
use App\Models\NurseNotification;
use App\Models\NurseShift;
use App\Models\RoleUser;
use App\Models\StoreToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class NurseApiController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        // $nurse_type = $request->nurse_type;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $distance = $request->distance;
        $member_id = $request->member_id;
        $slug = $request->slug;
        $nurse = Nurse::with(['user', 'shifts' => function ($query) {
            $query->where('date', '>=', Carbon::now()->format('Y-m-d'));
        }])
            ->when($slug, function ($query) use ($slug) {
                return $query->where('slug', $slug);
            })
            ->when($keyword, function ($query) use ($keyword) {
                $query->whereHas('user', function ($q) use ($keyword) {
                    return $q->where('name', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->when($member_id, function ($query) use ($member_id) {
                return $query->where('nurse_id','!=',$member_id);
            })
            // ->when($nurse_type, function ($query) use ($nurse_type) {
            //     return $query->where('nurse_type', $nurse_type);
            // })
            ->when($latitude && $longitude && $distance, function ($query) use ($latitude, $longitude, $distance) {
                return $query->select('*', DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                    * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                    + sin(radians(" . $latitude . ")) * sin(radians(latitude))) AS distance"))->having('distance', '<=', $distance);
            })
            ->paginate(12)->withQueryString();
        return response()->json($nurse);
    }

    public function store(Request $request){
        try {
            $request->validate([
                'nnc_no' => 'required',
                'gender' => 'required',
                'qualification' => 'required',
                'year_practiced' => 'required',
                'address' => 'required',
                // 'fee' => 'required',
            ]);
            $nurse = new Nurse();
            $nurse->nnc_no = $request->nnc_no;
            $nurse->nurse_id = $request->user()->id;
            $nurse->gender = $request->gender;
            $nurse->qualification = $request->qualification;
            $nurse->year_practiced = $request->year_practiced;
            $nurse->address = $request->address;
            $nurse->fee = $request->fee;
            $nurse->latitude = $request->latitude;
            $nurse->longitude = $request->longitude;
            if ($request->image) {
                $image = $request->image;
                if(env('STORAGE_TYPE') == 'minio'){
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($image, $destinationPath); 
                    $nurse->image_path = $imageUpload['path'];
                    $nurse->image = $imageUpload['file'];
                }else{
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($image,$folderPath);                    
                    $nurse->image_path = $imageUpload['path'];
                    $nurse->image = $imageUpload['file'];
                }
            }
            if ($request->file) {
                $imagefile = $request->file;
                if(env('STORAGE_TYPE') == 'minio'){
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($imagefile, $destinationPath); 
                    $nurse->file_path = $imageUpload['path'];
                    $nurse->file = $imageUpload['file'];
                }else{
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($imagefile,$folderPath);                    
                    $nurse->file_path = $imageUpload['path'];
                    $nurse->file = $imageUpload['file'];
                }
            }
            // if ($request->hasFile('image')) {
            //     $destination = 'public/images/' . $nurse->image;
            //     if (Storage::exists($destination)) {
            //         Storage::delete($destination);
            //     };
            //     $fileNameExt = $request->file('image')->getClientOriginalName();
            //     $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            //     $fileExt = $request->file('image')->getClientOriginalExtension();
            //     $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            //     $request->file('image')->storeAs('public/images', $fileNameToStore);
            //     $pathToStore =  asset('storage/images/' . $fileNameToStore);
            //     $nurse->image_path = $pathToStore;
            //     $nurse->image = $fileNameToStore;
            // }
             $nurse->slug =  'nurse-' . $this->random;
             if (Nurse::where('nurse_id', '=', auth()->user()->id)->exists() && RoleUser::where('user_id', auth()->user()->id)->count() == 2) {
                return response()->json(['error' => "You have already filled a form"],400);
             }
            $saved = $nurse->save();
        
            // $user = User::find($nurse->nurse_id);
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->phone = $request->phone;
            // $saved = $user->save();
            if($saved){
                return response()->json([
                    "status" => "true"
                ],200);
            }
        } catch  (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ],400);
        }
    }

    public function book(Request $request)
    {
        $member = Member::where('member_id', Auth::user()->id)->first();
        $book = new NurseBooking();
        $name = str_replace(' ', '-', 'Nurse-Booking');
        $book->slug = $name . '-' . $this->random;
        $book->member_id = $member->id;
        $book->nurseshift_id = $request->nurseshift_id;
        $book->messages = $request->messages;
        $user_details = User::where('id', Auth::user()->id)->first();
        $nurse_id = NurseShift::with('nurse.user')->find($request->nurseshift_id);
        $user = StoreToken::where('user_id', $nurse_id->nurse->user->id)->first();

        if ($user) {
            $notification_id = $user->device_key;
            $title = "Nurse Booked Notification ";
            $message = "Your have been booked by" . " " . $user_details->name;
            $type = "Nurse Booked";
            send_notification_FCM($notification_id, $title, $message,$type);
        }

        //send sms to nurse
        $nursetext = "Appointment Booked BY:" . " " . $user_details->name . " " . " Phone Number:" . " " . $user_details->phone . " " . "https://ghargharmadoctor.page.link/doctorhomepage";
        send_sms($nurse_id->nurse->user->phone, $nursetext);

        //send sms to user
        $usertext = "You Booked :" . " " . $nurse_id->nurse->user->name . " " . " Phone Number:" . " " . $nurse_id->nurse->user->phone . " " . "https://ghargharmadoctor.page.link/doctorhomepage";
        send_sms($user_details->phone, $usertext);
        if ($request->status == 0) {
            $book->status = 0;
            $book->booking_status = 'Not Scheduled';
        }
        if ($request->status == 1) {
            $book->status = 1;
            $book->booking_status = 'Scheduled';
        }
        $bookingNotification = new BookingNotification();
        $bookingNotification->user_id = Auth::user()->id;
        $bookingNotification->image = $nurse_id->image_path;
        $bookingNotification->title = "Booking Notification";
        $bookingNotification->body = "You booked Nurse." . $nurse_id->nurse->user->id . " " . "on" . " " . $nurse_id->nurse->user->created_at->format('Y-m-d');
        $bookingNotification->type = "User-Nurse-Booking";
        $bookingNotification->save();

        $bookingNotification = new BookingNotification();
        $bookingNotification->user_id = $user_details->id;
        $bookingNotification->image = $nurse_id->image_path;
        $bookingNotification->title = "Booking Notification";
        $bookingNotification->body = "You have been booked by" . $user_details->name . " " . "on" . " " . $user_details->created_at->format('Y-m-d');
        $bookingNotification->type = "Nurse Booked";
        $bookingNotification->save();
        $book->save();
        return response()->json([$book]);
    }

    public function payment(Request $request)
    {
        if($request->token){
            //payment verification (app)
            $khaltiVerify = Helper::khaltiVerify($request);
            if (isset($khaltiVerify['idx'])) {
                $nurse = NurseBooking::find($request->input('id'));
                $nurse->booking_status = 'Scheduled';
                $nurse->status = 1;
                $nurse->payment_method = 'Khalti';
                $nurse->payment_date = Carbon::now();
                $nurse->update();
                return response()->json([
                    'success' => 'Nurse Appointment Scheduled.',
                ]);
            } else {
                return response()->json([
                    'error' => 'Something went Wrong.',
                ]);
            }
        }else{
            //payment verification (web)
            $khaltiLookup = Helper::khaltiLookup($request->pidx);
            $responseData = $khaltiLookup->getData();
            if(isset($responseData->status) && $responseData->status === 'Completed'){
                $nurse = NurseBooking::find($request->input('id'));
                $nurse->booking_status = 'Scheduled';
                $nurse->status = 1;
                $nurse->payment_method = 'Khalti';
                $nurse->payment_date = Carbon::now();
                $nurse->update();
                return response()->json([
                    'success' => 'Nurse Appointment Scheduled.',
                ]);
            } else {
                return response()->json([
                    'error' => 'Payment Pending.',
                ],400);
            }
        }
    }

    public function bookings(Request $request)
    {
        if ($request->slug) {
            $member = Member::where('member_id', Auth::user()->id)->first();
            $bookings = NurseBooking::where('slug', $request->slug)->where('member_id', $member->id)->with(['member.user','shift.nurse.user','reports'])->first();
        } else {
            $member = Member::where('member_id', Auth::user()->id)->first();
            $bookings = NurseBooking::where('member_id', $member->id)->with(['member.user', 'shift.nurse.user'])->get();
        }
        return response()->json($bookings);
    }

    public function profile(){
        $nurse = Nurse::with('user')->where('nurse_id',Auth::user()->id)->first();
        return response()->json($nurse);
    }

    public function update(Request $request,$id){
        try {
            $request->validate([
                'email' => 'email|unique:users,email,'.Auth::user()->id,
                'phone' => 'unique:users,phone,'.Auth::user()->id,
            ]);
            $nurse = Nurse::find($id);
            $nurse->nnc_no = $request->nnc_no;
            $nurse->gender = $request->gender;
            $nurse->qualification = $request->qualification;
            $nurse->year_practiced = $request->year_practiced;
            $nurse->address = $request->address;
            $nurse->fee = $request->fee;
            $nurse->latitude = $request->latitude;
            $nurse->longitude = $request->longitude;
            if ($request->image) {
                $image = $request->image;
                if(env('STORAGE_TYPE') == 'minio'){
                    Storage::disk('minio')->delete('images/'.$nurse->image);
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($image, $destinationPath); 
                    $nurse->image_path = $imageUpload['path'];
                    $nurse->image = $imageUpload['file'];
                }else{
                    $deleteDestinationPath = 'public/images/' . $nurse->image;
                    if (Storage::exists($deleteDestinationPath)) {
                        Storage::delete($deleteDestinationPath);
                    }
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($image,$folderPath);                    
                    $nurse->image_path = $imageUpload['path'];
                    $nurse->image = $imageUpload['file'];
                }
            }
            if ($request->file) {
                $imagefile = $request->file;
                if(env('STORAGE_TYPE') == 'minio'){
                    Storage::disk('minio')->delete('images/'.$nurse->file);
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($imagefile, $destinationPath); 
                    $nurse->file_path = $imageUpload['path'];
                    $nurse->file = $imageUpload['file'];
                }else{
                    $deleteDestinationPath = 'public/images/' . $nurse->file;
                    if (Storage::exists($deleteDestinationPath)) {
                        Storage::delete($deleteDestinationPath);
                    }
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($imagefile,$folderPath);                    
                    $nurse->file_path = $imageUpload['path'];
                    $nurse->file = $imageUpload['file'];
                }
            }
            // if ($request->hasFile('image')) {
            //     $destination = 'public/images/' . $nurse->image;
            //     if (Storage::exists($destination)) {
            //         Storage::delete($destination);
            //     };
            //     $fileNameExt = $request->file('image')->getClientOriginalName();
            //     $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            //     $fileExt = $request->file('image')->getClientOriginalExtension();
            //     $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            //     $request->file('image')->storeAs('public/images', $fileNameToStore);
            //     $pathToStore =  asset('storage/images/' . $fileNameToStore);
            //     $nurse->image_path = $pathToStore;
            //     $nurse->image = $fileNameToStore;
            // }
            $name = str_replace(' ', '-', $request->name);
            $nurse->slug =  'nurse-' . $name . '-' . $this->random;
            $saved = $nurse->save();
        
            $user = User::find($nurse->nurse_id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $saved = $user->save();
            if($saved){
                return response()->json([
                    "status" => "true"
                ],200);
            }
        } catch  (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ],400);
        }
    }

    public function appointments(){
        $nurse = Nurse::where('nurse_id',Auth::user()->id)->first();
        $appointments = NurseBooking::with(['member.user','shift','reports'])->where('status',1)->whereHas('shift',function($query) use($nurse){
            $query->where('nurse_id',$nurse->id);
        })->get();
        return response()->json($appointments);
    }

    public function addshifts(Request $request){
        $nurse = Nurse::where('nurse_id',Auth::user()->id)->first();
        $nurseShift = NurseShift::where('date',$request->date)->where('nurse_id',$nurse->id)->first();
        if($nurseShift != null){
            $request->validate([
                'shift' => 'required'
            ]);
            $shift = NurseShift::find($nurseShift->id);
            $shift->nurse_id = $nurse->id;
            $shift->shift = $request->shift;
            $saved = $shift->save();
            if($saved){
                return response()->json(['success' => 'Nurse Shift Updated Successfully']);
            }
        }
        else{
            $request->validate([
                'shift' => 'required'
            ]);
            $shift = new NurseShift();
            $shift->nurse_id = $nurse->id;
            $shift->date = $request->date;
            $shift->shift = $request->shift;
            $saved = $shift->save();
            if($saved){
                return response()->json(['success' => 'Nurse Shift Added Successfully']);
            }
        }
    }

    public function getshifts(){
        $nurse = Nurse::where('nurse_id',Auth::user()->id)->first();
        $shifts = NurseShift::where('nurse_id',$nurse->id)->get();
        return response()->json($shifts);
    }
}