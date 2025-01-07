<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyName extends Model
{
    use HasFactory;

    public function primary()
    {
        return $this->belongsTo(Member::class, 'primary_member_id');
    }

    public function family(){
        return $this->hasMany(Family::class,'family_id','id')->where('approved',1)->where('payment_status',1);
    }
}
