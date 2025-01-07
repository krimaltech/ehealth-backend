<?php

use App\Models\RolePermission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pratiksh\Nepalidate\Facades\NepaliDate;

function csv_year()
{
  $date = NepaliDate::create(\Carbon\Carbon::now())->toBS();
  $formattedDate = Carbon::createFromFormat('Y-m-d', $date);
  return $formattedDate->format('Y'); // Extracting only the year
}

function send_notification_FCM($notification_id, $title, $message, $type)
{
  $accesstoken = env('FCM_KEY');
  $data = [
    "to" => $notification_id,
    "notification" => [
      "title" => $title,
      "body" => $message,
    ],
    "data" => [
      "status" => $type,
    ]
  ];
  $dataString = json_encode($data);

  $headers = [
    'Authorization: key=' . $accesstoken,
    'Content-Type: application/json',
  ];

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

  $response = curl_exec($ch);

  return $response;
}

function send_notification_for_admin($notification_id, $title, $message)
{
  $accesstoken = env('FCM_KEY');
  $data = [
    "to" => $notification_id,
    "data" => [
      "title" => $title,
      "body" => $message,
    ],
  ];
  $dataString = json_encode($data);

  $headers = [
    'Authorization: key=' . $accesstoken,
    'Content-Type: application/json',
  ];

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

  $response = curl_exec($ch);

  return $response;
}

function send_Multiple_Notification_FCM($notification_id, $title, $message)
{
  $accesstoken = env('FCM_KEY');
  $data = [
    "registration_ids" => array($notification_id),
    "notification" => [
      "title" => $title,
      "body" => $message,
    ]
  ];
  $dataString = json_encode($data);

  $headers = [
    'Authorization: key=' . $accesstoken,
    'Content-Type: application/json',
  ];

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

  $response = curl_exec($ch);

  return $response;
}

function send_sms($to, $text)
{
  $auth_token = env('AUTH_TOKEN');
  $data = http_build_query(array(
    "auth_token" => $auth_token,
    "to" => $to,
    'text'  => $text
  ));
  $url = "https://sms.aakashsms.com/sms/v3/send";

  # Make the call using API.
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1); ///
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  // Response
  $response = curl_exec($ch);
  // return $response;
  curl_close($ch);

  return $response;
}

function postDriverLocation($notification_id, $lat, $lon, $time)
{
  $accesstoken = env('FCM_KEY');
  $data = [
    "to" => $notification_id,
    "data" => [
      "lat" => $lat,
      "lon" => $lon,
      "time" => $time
    ]
  ];
  $dataString = json_encode($data);

  $headers = [
    'Authorization: key=' . $accesstoken,
    'Content-Type: application/json',
  ];

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

  $response = curl_exec($ch);

  return $response;
}

function loginViaQR($notification_id, $jwt)
{
  $accesstoken = env('FCM_KEY');
  $data = [
    "to" => $notification_id,
    "data" => [
      "jwt" => $jwt,
      "status" => 'qrLogin',
    ]
  ];
  $dataString = json_encode($data);

  $headers = [
    'Authorization: key=' . $accesstoken,
    'Content-Type: application/json',
  ];

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

  $response = curl_exec($ch);

  return $response;
}

function addFamilyViaQR($notification_id, $type)
{
  $accesstoken = env('FCM_KEY');
  $data = [
    "to" => $notification_id,
    "data" => [
      "status" => $type,
    ]
  ];
  $dataString = json_encode($data);

  $headers = [
    'Authorization: key=' . $accesstoken,
    'Content-Type: application/json',
  ];

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

  $response = curl_exec($ch);

  return $response;
}

function send_ambulance_notification($notification_id, $title, $message, $status)
{
  $accesstoken = env('FCM_KEY');
  $data = [
    "to" => $notification_id,
    "notification" => [
      "title" => $title,
      "body" => $message,
    ],
    "data" => [
      "status" => $status,
    ]
  ];
  $dataString = json_encode($data);

  $headers = [
    'Authorization: key=' . $accesstoken,
    'Content-Type: application/json',
  ];

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

  $response = curl_exec($ch);

  return $response;
}


function send_bulk_notification_FCM($notification_ids, $title, $message, $type)
{
  $accesstoken = env('FCM_KEY');
  $data = [
    "registration_ids" => $notification_ids,
    "notification" => [
      "title" => $title,
      "body" => $message,
    ],
    "data" => [
      "type" => $type
    ]
  ];
  $dataString = json_encode($data);

  $headers = [
    'Authorization: key=' . $accesstoken,
    'Content-Type: application/json',
  ];

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

  $response = curl_exec($ch);

  return $response;
}

function send_multiple_sms($to_array, $text)
{
  $auth_token = env('AUTH_TOKEN');
  $url = "https://sms.aakashsms.com/sms/v3/send";

  foreach ($to_array as $to) {
    $data = http_build_query(array(
      "auth_token" => $auth_token,
      "to" => $to,
      'text'  => $text
    ));

    # Make the call using API.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1); ///
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // Response
    $response = curl_exec($ch);
    $response_array[] = $response;
    // return $response;
    curl_close($ch);
  }
  return $response;
}
function checkPermission($id)
{
  $items = array('SuperAdmin', "Admin");
  $permission = RolePermission::with('role_type', 'sub_role_type')->whereJsonContains('permission_id', [$id])->get();
  foreach ($permission as $item) {
    $items[] = array_merge([$item->role_type->role_type], [$item->sub_role_type->subrole]);
  }
  return $items;
}

function topic_based_notification($notification_ids, $title, $message, $topic)
{
  $accesstoken = env('FCM_KEY');
  $data = [
    "registration_ids" => $notification_ids,
    "notification" => [
      "title" => $title,
      "body" => $message,
    ],
    "data" => [
      "topic" => $topic
    ]
  ];
  $dataString = json_encode($data);

  $headers = [
    'Authorization: key=' . $accesstoken,
    'Content-Type: application/json',
  ];

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

  $response = curl_exec($ch);

  return $response;
}

// store image in laravel project directory
function storeImageLaravel(Request $request, $image_name, $image_path)
{
  $fileNameExt = $request->file($image_name)->getClientOriginalName();
  $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
  $fileExt = $request->file($image_name)->getClientOriginalExtension();
  $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
  $request->file($image_name)->storeAs('public/images', $fileNameToStore);
  $pathToStore =  asset('storage/images/' . $fileNameToStore);
  $image_path = $pathToStore;
  $image_name = $fileNameToStore;
  return [$image_name, $image_path];
}
// store image in object storage directory 

function storeImageStorage(Request $request, $image_name, $image_path)
{
  $path = $request->file($image_name)->store('images', 'minio');
  $image_name = basename($path);
  $image_path = Storage::disk('minio')->url($path);
  // Storage::disk('minio')->put('images/', $image_path);
  return [$image_name, $image_path];
}
// delete image in object storage directory 
function deleteImageNative($destination)
{
  if (Storage::exists($destination)) {
    Storage::delete($destination);
  };
}
// delete image in object storage directory 
function deleteImageMinio($destination)
{
  Storage::disk('minio')->delete($destination);
}
