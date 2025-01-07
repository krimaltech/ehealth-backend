<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportProblem extends Model
{
    use HasFactory;

    public function member(){
        return $this->belongsTo(Member::class,'member_id','id');
    }
    public function reportsubject(){
        return $this->belongsTo(ReportSubject::class,'subject_id','id');
    }
}
