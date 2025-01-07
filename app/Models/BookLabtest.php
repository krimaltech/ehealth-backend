<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLabtest extends Model
{
    use HasFactory;
    
    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function lab(){
        return $this->belongsTo(Employee::class,'labtechnician_id','id');
    }

    public function labprofile(){
        return $this->belongsTo(LabProfile::class,'labprofile_id','id');
    }

    public function labtest(){
        return $this->belongsTo(LabTest::class,'labtest_id','id');
    }

    public function reports(){
        return $this->hasMany(BookLabtestReport::class,'book_id','id');
    }
}
