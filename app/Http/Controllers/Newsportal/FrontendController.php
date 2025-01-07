<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\User;
// use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactFormMessage;
class FrontendController extends Controller
{
    public function index(){

    }


 public function contactstore(Request $request){
    
    $request->validate([
        'name'=>'required',
        'email'=>'required',
        'address'=>'required',
        ]);

    $contact= new Contact;
    $contact->name=$request->name;
    $contact->phone=$request->phone;
    $contact->email=$request->email;
    $contact->address=$request->address;
    $contact->description=$request->description;
    $contact->seen=0;
    $contact->save();
    $user=User::first();

     $user->notify(new ContactFormMessage($contact));

 return redirect()->back()->with('success','Thanks for your enquiry');
}
}
