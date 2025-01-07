<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScreeningUserReview extends Model
{
    use HasFactory;

    public function member(){
        return $this->belongsTo(Member::class,'member_id','id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function dates(){
        return $this->belongsTo(ScreeningDate::class,'screeningdate_id','id');
    }
}
