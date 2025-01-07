<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function service(){
        return $this->hasMany(Services::class, 'service_id', 'id');
    }

    public function screenings(){
        return $this->belongsToMany(Screening::class,'package_screenings');
    }

    public function fees(){
        return $this->hasMany(PackageFee::class, 'package_id', 'id');
    }

    public function packagescreening(){
        return $this->hasMany(PackageScreening::class,'package_id','id');
    }

    public function coverage(){
        return $this->hasMany(PackageInsuranceCoverage::class,'package_id','id');
    }
}
