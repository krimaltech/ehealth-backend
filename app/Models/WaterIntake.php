<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterIntake extends Model
{
    use HasFactory;

    public function days(){
        return $this->hasMany(DailyWaterIntake::class,'intake_id','id');
    }
    public function intervals(){
        return $this->hasMany(WaterIntakeInterval::class,'intake_id','id');
    }
}
