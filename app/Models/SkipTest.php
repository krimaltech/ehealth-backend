<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkipTest extends Model
{
    use HasFactory;

    public function profile(){
        return $this->belongsTo(LabProfile::class,'labprofile_id','id');
    }
    public function test(){
        return $this->belongsTo(LabTest::class,'labtest_id','id');
    }
    public function report(){
        return $this->belongsTo(MedicalReport::class,'report_id','id');
    }
}
