<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingReview extends Model
{
    use HasFactory;
    public function slot(){
        return $this->belongsTo(Slots::class, 'booking_id', 'id')->withTrashed();
    }
    public function doctor_profile(){
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }
    // public function user(){
    //     return $this->belongsTo(User::class,'user_id');
    // }
    public function meeting(){
        return $this->hasOne(Meeting::class,'booking_id','id');
    }
    public function report(){
        return $this->hasOne(AppointmentCompleted::class,'booking_id','id');
    }
    public function member()
    {
       return $this->belongsTo(Member::class,'user_id','id');
    }
    public function forwardreports()
    {
       return $this->hasMany(ForwardReport::class,'booking_id','id');
    }
    public function userreview()
    {
       return $this->hasOne(UserReview::class,'appointment_id','id');
    }
}
