<?php

namespace App\Models;

use App\Mail\NewDeviceDetected;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity, AuthenticationLoggable;
    protected static $logFillable = true;
    protected static $logName = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'first_name',
        'middle_name',
        'last_name',
        'user_name',
        'name',
        'email',
        'role',
        'phone',
        'is_verified',
        'password',
        'referrer_id',
        'created_at',
        'updated_at',
        'school_gd_id',
        'is_school',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot',
    ];
    protected $appends = ['referral_link'];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->whereNull('deleted_at');
    }
    // public function friends()
    // {
    //     return $this->hasMany(Family::class, 'user_id');
    // }
    public function usertoken()
    {
        return $this->hasOne(StoreToken::class, 'user_id', 'id');
    }
    public function subroles()
    {
        return $this->hasOne(SubRole::class, 'id', 'subrole');
    }
    public function kyc()
    {
        return $this->hasOne(KnowYourCustomer::class, 'id', 'global_form_id');
    }
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }
    public function referred()
    {
        return $this->hasOne(User::class, 'referrer_id');
    }
    public function getReferralLinkAttribute()
    {
        return $this->referral_link = route('register', ['ref' => $this->id]);
    }

    public function hasRole(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('id', $role)) {
                return true;
            }
        }
        return false;
    }

    public function getRoleName()
    {
        return $this->roles->pluck('name')[0];
    }

    public function insurance()
    {
        return $this->hasOne(PackageInsuranceDetail::class, 'user_id', 'id');
    }

    public function member()
    {
        return $this->hasOne(Member::class, 'member_id', 'id');
    }

    public function generateCode($unique_id, $platform)
    {
        $check = SessionTokens::where('user_id', auth()->user()->id)
            ->where('unique_id', $unique_id)
            ->where('platform', $platform)
            ->where('is_verified', 1)
            ->latest()
            ->exists();
        if ($check) {
            return 'Already Logged In Device';
        } else {
            // SessionTokens::where('user_id',auth()->user()->id)->where('unique_id', $unique_id)->delete()->latest();
            $token = new SessionTokens();
            $token->user_id = auth()->user()->id;
            $token->token = Str::random(64);
            $token->otp = mt_rand(100000, 999999);
            $token->is_logged = 1;
            $token->unique_id = $unique_id;
            $token->platform = $platform;
            $verify = SessionTokens::where('user_id',auth()->user()->id )->first();
            if ($verify === null) {
                $token->is_verified = 1;
            }
            $token->save();
            $otp = [
                "otp" => $token->otp,
            ];
            Mail::to(auth()->user()->email)->send(new NewDeviceDetected($otp));
            if (
                auth()->user()->is_enabled == 1
            ) {
                return 'New Device Detected Your Code is' . " " . $token->otp;
            } else {
                return 'Two Factor Authorization Is Disabled';
            }
        }


        // $receiverNumber = auth()->user()->phone;
        // $message = "2FA login code is ". $token->otp;
    }
    public function checkLoggedIn($unique_id, $platform)
    {
        SessionTokens::where('user_id', auth()->user()->id)
            ->where('unique_id', $unique_id)
            ->where('platform', $platform)
            ->exists();
    }

    public function deactivate()
    {
        return $this->hasOne(DeactivateStudentList::class,'user_id')->latest();
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'employee_id', 'id');
    }
}
