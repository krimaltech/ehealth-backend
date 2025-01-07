<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    use HasFactory;

    public function labdepartment(){
        return $this->belongsTo(LabDepartment::class,'department_id','id');
    }

    public function labprofile(){
        return $this->belongsTo(LabProfile::class,'profile_id','id');
    }

    public function labvalue(){
        return $this->hasMany(LabValue::class,'labtest_id','id');
    }
}
