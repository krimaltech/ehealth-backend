<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Mail\EmployeeAccountVerification;
use App\Mail\ManualMail;
use App\Mail\SendCodeResetPassword;
use App\Mail\UpdateEmailOtp;
use App\Mail\VerifyEmail;
use App\Models\ActivateStudent;
use App\Models\DeactivateStudent;
use App\Models\DeactivateStudentList;
use App\Models\Family;
use App\Models\Member;
use App\Models\PhoneNumberValidation;
use App\Models\Referral;
use App\Models\RoleUser;
use App\Models\SessionTokens;
use App\Models\StoreToken;
use App\Models\TopicBasedNotification;
use App\Models\UpdateEmail;
use App\Models\User;
use App\Models\UserVerify;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Passport\Token;

class UserAuthController extends Controller
{
    protected $random;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required', 'string', 'min:8',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/',
            ],
            'phone' => ['required', 'unique:users'],
        ]);
    }

    public function login(Request $request)
    {
        try {
            $login = $request->input('login');
            $password = $request->input('password');

            // Check if the login input is an email or a phone number
            $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
            request()->merge([$fieldType => $login]);

            $credentials = [
                $fieldType => $login,
                'password' => $password,
            ];
            if (!auth()->attempt($credentials, $request->remember)) {
                return response(['message' => [
                    'error' => ['Invalid Credentials']
                ]], 401);
            }

            $tokenId = auth()->user()->createToken('API Token')->token->id;
            $token = auth()->user()->createToken('API Token')->accessToken;
            $user = User::find(auth()->user()->id);
            if ($user->is_school == 0 && $request->platform == 'mobile') {
                return response(['message' => [
                    'error' => ['In order to login from a school account, please visit out website.']
                ]], 401);
            }
            if ($user->is_verified == 0) {
                return response(['message' => [
                    'error' => ['User Not Verified. Please Verify your email!']
                ]], 401);
            }
            if ($user->is_verified == 1) {
                return response(['user' => User::with('roles')->find(auth()->user()->id), 'tokenId' => $tokenId, 'token' => $token, 'logged_id' => auth()->user()->generateCode($request->unique_id, $request->platform)]);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }
    }
    public function schoolLogin(Request $request)
    {
        try {
            $login = $request->input('user_name');
            $password = $request->input('password');

            $credentials = [
                'user_name' => $login,
                'password' => $password,
            ];
            if (!auth()->attempt($credentials, $request->remember)) {
                return response(['message' => [
                    'error' => ['Invalid Credentials']
                ]], 401);
            }

            $token = auth()->user()->createToken('API Token')->accessToken;
            $user = User::find(auth()->user()->id);

            if ($user->is_verified == 0) {
                return response(['message' => [
                    'error' => ['User Not Verified. Please Verify your email!']
                ]], 401);
            }
            if ($user->is_verified == 1) {
                return response(['user' => User::with('roles')->find(auth()->user()->id), 'token' => $token]);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }
    }

    protected function create(array $data)
    {
        $referrer = Referral::where("referral_email", $data['email'])->orWhere('phone', $data['phone'])->first();
        return User::create([
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'name' => $data['first_name'] . " " . $data['middle_name'] . " " . $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'is_verified' => $data['is_verified'],
            'referrer_id' => $referrer ? $referrer->gd_id : null,
        ]);
    }

    public function register(Request $request)
    {

        try {
            $this->validator($request->all())->validate();
            $user = $this->create($request->all());
            $token = Str::random(64);

            UserVerify::create([
                'user_id' => $user->id,
                'token' => $token
            ]);

            Mail::to($request->email)->send(new VerifyEmail($token));
            event(new Registered($user));

            $member = new Member();
            $member->member_id = $user->id;
            $member->gd_id = NULL;
            $name = str_replace(' ', '-', $user->name);
            $member->slug =  'member-' . $name . '-' . $this->random;
            $saved = $member->save();
            $update_gd_id = Member::where('member_id', $user->id)->first();
            $update_gd_id->gd_id = 'GD-' . $member->id;
            $update_gd_id->update();
            if ($saved) {
                $user_role = new RoleUser();
                $user_role->user_id = $user->id;
                $user_role->role_id = 6;
                $user_role->save();
            }
            if ($user->referrer_id != NULL) {
                $referrer = Referral::where("referral_email", $user->email)->first();
                $referrer->status = $user->name . ' referred';
                $referrer->save();
            }
            $device_key = StoreToken::where('user_id', 2)->first();
            if ($device_key) {
                send_notification_for_admin($device_key->device_key, 'New user Registered', 'new user registered');
            }
            return response()->json([
                "status" => "true",
                "message" => "Please verify your gmail to login."
            ], 200);
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }
    }
    public function forgot_password(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // Delete all old code that user send before.
        DB::table('password_resets')->where('email', $request->email)->delete();

        $token = Str::random(60);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Hash::make($token),
            'code' => $data['code'] = mt_rand(100000, 999999),
            'created_at' => Carbon::now()
        ]);
        $codeData = DB::table('password_resets')->where('email', $request->email)->first();
        // Send email to user
        Mail::to($request->email)->send(new SendCodeResetPassword($codeData));

        return response(['message' => trans('passwords.sent'), "OTP" => $codeData->code]);
    }
    public function change_password(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'code' => 'required|string|exists:password_resets',
            'password' => [
                'required', 'string', 'min:8', 'confirmed',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/',
            ],
        ]);
        if ($validation->fails()) {
            return response(['errors' => $validation->errors()->getMessages()]);
        }
        // $request->validate([
        //     'code' => 'required|string|exists:password_resets',
        //     'password' => 'required|string|min:8|confirmed',
        //         'regex:/[a-z]/',      // must contain at least one lowercase letter
        //         'regex:/[A-Z]/',      // must contain at least one uppercase letter
        //         'regex:/[0-9]/',      // must contain at least one digit
        //         'regex:/[@$!%*#?&]/',
        // ]);

        // find the code
        $passwordReset =  DB::table('password_resets')->where('code', $request->code)->first();
        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at > Carbon::now()->addHour()) {
            $passwordReset->delete();
            return response(['message' => trans('passwords.code_is_expire')], 422);
        }

        // find user's email 
        $user = User::where('email', $passwordReset->email)->first();

        $user->password = Hash::make($request->password);
        // update user password
        $user->update($request->only($user->password));

        // delete current code 
        DB::table('password_resets')->where('email', $user->email)->delete();

        return response(['message' => 'password has been successfully reset']);
    }

    public function change_old_password(Request $request)
    {
        $auth = Auth::user();

        $request->validate([
            'current-password' => 'required',
            'new-password' => 'required',
        ]);

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return response()->json(["error" => "Your current password does not matches with the password."], 400);
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Current password and new password same
            return response()->json(["error" => "New Password cannot be same as your current password."], 400);
        }

        //Change Password
        $user = User::find($auth->id);
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return response()->json(["success" => "Password changed successfully!"], 200);
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
        if ($verifyUser->created_at->diffInHours(Carbon::now()) < 24) {
            $notification = User::where('id', $verifyUser->user_id)->first();
            if ($notification->is_verified == 0) {
                $notification->is_verified = 1;
                $notification->update();
                send_sms($notification->phone, 'Your Account has been created successfully.');
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
            if ($notification->subrole == NULL) {
                return redirect(env('REACT_URL').'/login?login=email-verified-successfully')->with('success', $message);
            } else {
                return redirect(env('APP_URL').'/login')->with('success', $message);
            }
        } else {
            $message = "Your token has expired. Please try again.";
            return redirect(env('REACT_URL').'/login?login=email-verified-successfully')->with('error', $message);
        }
    }

    public function resendVerifyToken(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            UserVerify::where('user_id', $user->id)->delete();
            $token = Str::random(64);

            UserVerify::create([
                'user_id' => $user->id,
                'token' => $token
            ]);
            Mail::to($request->email)->send(new VerifyEmail($token));
            return response(['message' => 'Verify link sent successfully!']);
        } catch (\Throwable $th) {
            return response(['message' => 'Incorrect Mail'], 400);
        }
    }

    public function resendEmployeeVerifyToken(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        UserVerify::where('user_id', $user->id)->delete();
        $token = Str::random(64);

        UserVerify::create([
            'user_id' => $user->id,
            'token' => $token
        ]);
        $maildata = [
            'token' => $token,
            'email' => $user->email,
            'password' => ''
        ];
        Mail::to($request->email)->send(new EmployeeAccountVerification($maildata));
        return redirect(env('APP_URL').'/login')->with('success','Verification link send successfully');
    }
    //*Update Or Verify Phone Number
    public function verifyPhoneNumber(Request $request)
    {
        try {
            $user = User::where('phone', $request->phone)->first();
            PhoneNumberValidation::where('user_id', $user->id)->delete();
            $otp = mt_rand(100000, 999999);

            PhoneNumberValidation::create([
                'user_id' => $user->id,
                'otp' => $otp,
                'is_verified' => '0',
            ]);
            send_sms($user->phone, 'Your OTP for phone number validation is' . " " . $otp . " " . "Do not share this OTP with others");
            return response(['message' => 'OTP send successfully!', 'otp' => $otp]);
        } catch (\Throwable $th) {
            return response(['message' => 'Invalid Phone Number'], 400);
        }
    }

    public function verifyOtp(Request $request)
    {
        try {
            $verifyOtp = PhoneNumberValidation::where('user_id', auth()->user()->id)->where('otp', $request->otp)->first();
            if ($verifyOtp->created_at->diffInMinutes(Carbon::now()) < 5) {
                $verifyOtp->is_verified = 1;
                $verifyOtp->update();
                $message = 'Your phone number is verified';

                $user = User::find(Auth::user()->id);
                $user->phone_verified = 1;
                $user->update();

                $code = 200;
            } else {
                $message = "Your OTP has expired. Please try again.";
                $code = 400;
            }
        } catch (\Throwable $th) {
            $message = 'Invalid OTP';
            $code = 400;
        }
        return response(['message' => $message], $code);
    }

    //*Update Or Verify Email Number
    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response(['message' => 'Email is not available. Please try again using a different email address.']);
        }
        UpdateEmail::where('user_id', $user->id)->delete();
        $otp = mt_rand(100000, 999999);

        UpdateEmail::create([
            'user_id' => $user->id,
            'otp' => $otp,
            'is_verified' => '0',
        ]);
        Mail::to($request->email)->send(new UpdateEmailOtp($otp));
        return response(['message' => 'OTP send successfully!']);
    }

    public function verifyEmailOtp(Request $request)
    {
        try {
            $verifyOtp = UpdateEmail::where('user_id', auth()->user()->id)->where('otp', $request->otp)->first();
            if ($verifyOtp->created_at->diffInMinutes(Carbon::now()) < 5) {
                $verifyOtp->is_verified = 1;
                $verifyOtp->update();
                $message = 'Your Email has been verified';

                $code = 200;
            } else {
                $message = "Your OTP has expired. Please try again.";
                $code = 400;
            }
        } catch (\Throwable $th) {
            $message = 'Invalid OTP';
            $code = 400;
        }
        return response(['message' => $message], $code);
    }

    public function recaptcha(Request $request)
    {
        $secret = env('RECAPTCHA_SECRET_KEY');
        $token = $request->token;
        $data = http_build_query(array(
            "secret" => $secret,
            'response'  => $token
        ));
        $url = "https://www.google.com/recaptcha/api/siteverify";

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

    public function authenticated(Request $request, $user)
    {

        Auth::logoutOtherDevices($request->get('password'));
    }

    public function logoutAll(Request $request)
    {
        $user = Auth::user();

        // Get the current access token
        $currentAccessToken = $request->token_id;

        // Revoke all of the user's access tokens and refresh tokens except for the current one
        $user->tokens()->where('id', '<>', $currentAccessToken->id)->delete();

        return response()->json([
            'message' => 'Successfully logged out from all devices except for the current one'
        ]);
    }

    public function checkToken(Request $request)
    {
        // Find the token by its access token
        $token = Token::where('id', $request->token_id)->first();

        // Get the token ID
        $tokenId = $token->id;
        // Find the token by ID
        $token = Token::find($tokenId);

        // Check if the token is expired
        if ($token->expires_at < now()) {
            // The token has expired
            return response()->json(['message' => 'Token has expired', 401]);
        } else {
            // The token is still valid
            return response()->json(['message' => 'Token is still valid', 200]);
        }
    }

    public function revokeToken(Request $request)
    {
        $user = Auth::user();
        $refreshToken = $user->createToken('MyApp Refresh Token')->accessToken;
        return response()->json([
            'message' => 'Token has been refreshed',
            'refresh_token' => $refreshToken
        ]);
    }

    public function verifyUser(Request $request)
    {
        // try {
        $verifyOtp = SessionTokens::where('user_id', auth()->user()->id)->where('otp', $request->otp)->first();
        if ($verifyOtp->created_at->diffInMinutes(Carbon::now()) < 5) {
            $verifyOtp->is_verified = 1;
            $verifyOtp->update();
            $tokenId = auth()->user()->createToken('API Token')->token->id;
            $token = auth()->user()->createToken('API Token')->accessToken;
            $message = ['user' => User::with('roles')->find(auth()->user()->id), 'tokenId' => $tokenId, 'token' => $token];

            $code = 200;
        } else {
            $message = "Your OTP has expired. Please try again.";
            $code = 400;
        }
        // } 
        return response(['message' => $message], $code);
    }

    public function check2faStatus($id)
    {
        $data = User::where('is_enabled', 1)->where('id', $id)->exists();
        $store_token = StoreToken::where('user_id', $id)->exists();
        return response()->json([
            'is_enabled' => $data,
            'fcm_stored' => $store_token,
        ]);
    }

    public function toggle2faStatus($id, $number)
    {
        $data = User::findOrFail($id);
        $data->is_enabled = $number;
        $data->update();
        return response()->json(['status' => true]);
    }

    public function deleteTokenId(Request $request)
    {
        $user = Auth::user();

        // Get the current access token
        $currentAccessToken = $request->user()->token();

        // Revoke all of the user's access tokens and refresh tokens except for the current one
        $user->tokens()->where('id', $currentAccessToken->id)->delete();

        return response()->json([
            'message' => 'Successfully logged out from the current device'
        ]);
    }

    public function deleteFcm(Request $request)
    {
        // Revoke all of the user's access tokens and refresh tokens except for the current one
        StoreToken::where('user_id', Auth::user()->id)->where('platform', $request->platform)->delete();
        return response()->json([
            'message' => 'Successfully deleted of the current device.'
        ]);
    }

    public function deleteTopicBased(Request $request)
    {
        // Revoke all of the user's access tokens and refresh tokens except for the current one
        TopicBasedNotification::where('device_key', $request->device_key)->delete();
        return response()->json([
            'message' => 'Successfully deleted device key of the current device.'
        ]);
    }

    public function checkTopicBased(Request $request)
    {
        $device_key = TopicBasedNotification::where('device_key', $request->device_key)->exists();
        if ($device_key) {
            return response()->json([
                'fcm_stored' => $device_key,

            ]);
        } else {
            return response()->json([
                'fcm_stored' => $device_key,
            ]);
        }
    }

    public function deactivate_users(Request $request)
    {
        $deactivateRequest = DeactivateStudent::where('profile_id', $request->profile_id)->first();
        if ($deactivateRequest && $deactivateRequest->status == 0) {
            return response()->json(['message' => [
                'error' => ['You already have a pending student deactivation request.']
            ]], 400);
        } else {
            try {
                $request->validate([
                    'deactivate_reason' => 'required',
                ]);
                $deactivate = new DeactivateStudent();
                $deactivate->profile_id  = $request->profile_id;
                $deactivate->status = 0;
                $deactivate->deactivate_reason = $request->deactivate_reason;
                $saved = $deactivate->save();
                if ($saved) {
                    $ids = explode(",", $request->id);
                    foreach ($ids as $id) {
                        $student = new DeactivateStudentList();
                        $student->deactivate_id = $deactivate->id;
                        $student->user_id  = $id;
                        $student->save();
                    }
                }
                return response()->json(['message' => 'Students Deactivation Requested Successfully.']);
            } catch (ValidationException $th) {
                return response([
                    "message" => $th->errors(),
                ], 400);
            }
        }
    }

    public function activate_users(Request $request)
    {
        $activateRequest = ActivateStudent::where('profile_id', $request->profile_id)->where('deactivate_student_id', $request->deactivate_student_id)->first();
        if ($activateRequest && $activateRequest->status == 0) {
            return response()->json(['message' => [
                'error' => ['You already have a pending student activation request.']
            ]], 400);
        } else {
            try {
                $request->validate([
                    'activate_reason' => 'required',
                ]);
                $activate = new ActivateStudent();
                $activate->profile_id  = $request->profile_id;
                $activate->deactivate_student_id  = $request->deactivate_student_id;
                $activate->status = 0;
                $activate->activate_reason = $request->activate_reason;
                $saved = $activate->save();
                if ($saved) {
                    return response()->json(['message' => 'Students Activation Requested Successfully.']);
                }
            } catch (ValidationException $th) {
                return response([
                    "message" => $th->errors(),
                ], 400);
            }
        }
    }

    public function existingEmail(Request $request)
    {
        $email_check = User::where('email', $request->email)->first();
        if ( $email_check) {
            return response()->json([
                'message' => 'Email Already Existed.'
            ]);
        } else {
            return response()->json([
                'message' => 'Email Does Not Existed.'
            ]);
        }
    
    }
}
