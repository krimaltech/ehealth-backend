<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepCount extends Model
{
    use HasFactory;

    public function step(){
        return $this->hasMany(DailyStepCount::class,'stepcount_id','id');
    }
}
