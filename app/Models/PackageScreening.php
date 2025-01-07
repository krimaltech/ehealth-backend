<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageScreening extends Model
{
    use HasFactory;

    public function screening(){
        return $this->belongsTo(Screening::class);
    }

    // public function services(){
    //     return $this->hasMany(ScreeningService::class,'package_screening_id','id');
    // }

    public function tests(){
        return $this->hasMany(ScreeningTest::class,'package_screening_id','id');
    }
}
