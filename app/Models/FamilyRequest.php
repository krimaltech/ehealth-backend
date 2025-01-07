<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyRequest extends Model
{
    use HasFactory;

    public function sendmember(){
        return $this->belongsTo(Member::class,'sent_id','id');
    }
    public function receivemember(){
        return $this->belongsTo(Member::class,'received_id','id');
    }
}
