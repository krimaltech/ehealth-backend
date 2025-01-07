<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageInsuranceCoverage extends Model
{
    use HasFactory;

    public function package(){
        return $this->belongsTo(Package::class,'package_id','id');
    }

    public function insurancetype(){
        return $this->belongsTo(InsuranceType::class,'insurance_type_id','id');
    }
}
