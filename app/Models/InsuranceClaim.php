<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceClaim extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function claim(){
        return $this->belongsTo(User::class,'claiming_user_id');
    }

    public function insurance(){
        return $this->belongsTo(PackageInsuranceCoverage::class,'package_insurance_id');
    }
}
