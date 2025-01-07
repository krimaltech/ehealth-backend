<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $casts = [
        'hospital' => 'array',
    ];
    protected $fillable = [
        'nmc_no',
        'gender',
        'doctor_type',
        'salutation',
        'qualification',
        'year_practiced',
        'image',
        'file',
        'address',
        'specialization',
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
    public function departments(){
        return $this->belongsTo(Department::class, 'department', 'id');
    }
    public function bookings(){
        return $this->hasMany(Booking::class,'doctor_id');
    }
}
