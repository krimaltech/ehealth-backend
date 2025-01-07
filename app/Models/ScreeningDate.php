<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScreeningDate extends Model
{
    use HasFactory;

    public function screening(){
        return $this->belongsTo(Screening::class);
    }

    public function userpackage(){
        return $this->belongsTo(UserPackage::class,'userpackage_id','id');
    }

    // protected $casts=['employee_ids'=>'array'];

    public function employees(){
        return $this->hasMany(PackageScreeningTeam::class,'screeningdate_id','id');
    }
    public function reports(){
        return $this->hasMany(MedicalReport::class,'screeningdate_id','id');
    }
    public function online(){
        return $this->hasMany(OnlineConsultation::class,'screeningdate_id','id');
    }
    public function feedback(){
        return $this->hasMany(ScreeningEmployeeReview::class,'screeningdate_id','id');
    }
    public function nosample(){
        return $this->hasMany(SampleNotCollected::class,'screeningdate_id','id')->where('additional_collection_status',0);
    }
    public function additionalnosample(){
        return $this->hasMany(SampleNotCollected::class,'screeningdate_id','id')->where('additional_collection_status',1);
    }
}
