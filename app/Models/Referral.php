<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    public function refferal()
    {
        return $this->belongsTo(User::class,'gd_id','id');
    }
}
