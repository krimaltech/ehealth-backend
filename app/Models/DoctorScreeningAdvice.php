<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorScreeningAdvice extends Model
{
    use HasFactory;

    public function team(){
        return $this->belongsTo(PackageScreeningTeam::class,'package_screening_teams_id','id');
    }
}
