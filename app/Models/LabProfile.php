<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabProfile extends Model
{
    use HasFactory;

    public function labdepartment(){
        return $this->belongsTo(LabDepartment::class,'department_id','id');
    }
    public function labtest(){
        return $this->hasMany(LabTest::class,'profile_id','id');
    }
}
