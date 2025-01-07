<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceType extends Model
{
    use HasFactory;

    public function coverage(){
        return $this->hasMany(PackageInsuranceCoverage::class,'insurance_type_id','id');
    }
}
