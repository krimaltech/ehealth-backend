<?php

namespace App\Http\Controllers;

use App\Models\BookingNotification;

use Illuminate\Http\Request;

class BookingNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        $bookingNotification = BookingNotification::where('type',$type)->with('user')->orderby('watched','asc')->get();
        return view('admin.notification.index', compact('bookingNotification','type'));
    }

    public function notification_view($type, $id){
        $notification= BookingNotification::where([['type',$type],['id',$id]])->firstOrFail();
        // $notification->watched='seen';
        // $notification->update();
        return view('admin.notification.view',compact("notification"));
    }

    public function allNotification(){
        $bookingNotification = BookingNotification::with('user')->get();
        return view('admin.notification.all',compact('bookingNotification'));
    }
}
