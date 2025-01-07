<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumberValidation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'otp',
        'is_verified'
    ];
}
