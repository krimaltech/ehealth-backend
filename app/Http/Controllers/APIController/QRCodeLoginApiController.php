<?php

namespace App\Http\Controllers\APIController;

use App\Events\MyEvent;
use App\Http\Controllers\Controller;
use App\Models\QrCodeLogin;
use App\Models\StoreToken;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class QRCodeLoginApiController extends Controller
{
      // QR code should be only avilable for non logged in user
      public function qr()
      {
  
          if (Auth::check())
          {
  
              return "you are already logged in, open it in incognito mode";
  
          }
          else
          {
  
              return view('frontend.drm.qr');
          }
      }
  
      //QR scanner only avilable for logged in user
      public function qrscanner()
      {
          if (Auth::check())
          {
              $login = true;
  
              return view('frontend.drm.qrscanner', compact('login'));
          }
          return redirect()->route('home');
      }
  
      public function CreateQrcodeAction(Request $request)
      {
        // QrCodeLogin::where('user_id',auth()->user()->id)->where('fcm', $request->fcm)->delete();
          $key = Str::random(64);
          $qr_login = new QrCodeLogin();
          $qr_login->token = $key;
          $qr_login->fcm = '$dsfgsdfgaksjdfiadasdfjasdfnkljhioadsf';
          $qr_login->save();
          return response()->json(['success' => true, 'key' => $qr_login->token, 'type' => 'login']);
      }
  
      // Mobile device scan code
      public function mobileScanQrcodeAction(Request $request)
      {
        $qr_login = QrCodeLogin::where('token',$request->token)->first();
        if (!$qr_login) {
            return response()->json(['success' => false]);
        }
        $qr_login->user_id = auth()->user()->id;
        $qr_login->update();
        if ($qr_login) {
            $key = QrCodeLogin::where('token',$request->token)->first();
            event(new MyEvent($request->token,auth()->user()->createToken('API Token')->accessToken));
            return response()->json(['success' => true]);
        }
      }
}
