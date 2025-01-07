<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLabtestReport extends Model
{
    use HasFactory;

    public function labvalue(){
        return $this->belongsTo(LabValue::class,'labvalue_id','id');
    }

    public function labtest(){
        return $this->belongsTo(LabTest::class,'labtest_id','id');
    }
}
