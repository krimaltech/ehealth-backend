<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberLeaveRequest extends Model
{
    use HasFactory;

    public function member(){
        return $this->belongsTo(Member::class,'member_id','id');
    }
    public function family(){
        return $this->belongsTo(FamilyName::class,'family_id','id');
    }
}
