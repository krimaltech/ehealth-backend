<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NurseBooking extends Model
{
    use HasFactory;

    public function member(){
        return $this->belongsTo(Member::class,'member_id','id');
    }

    public function shift(){
        return $this->belongsTo(NurseShift::class,'nurseshift_id','id');
    }

    public function reports(){
        return $this->hasMany(NurseBookingReport::class,'booking_id','id');
    }
}
