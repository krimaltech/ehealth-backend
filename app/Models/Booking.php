<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $casts = [
        'slots' => 'array',
    ];
    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
        // return $this->belongsTo(User::class, 'doctor_id');
    }

    public function slots(){
        return $this->hasMany(Slots::class,'slot_id');
    }

    public function times(){
        return $this->hasMany(Slots::class,'slot_id');
    }
}
