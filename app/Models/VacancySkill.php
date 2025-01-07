<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancySkill extends Model
{
    use HasFactory;

    public function skill(){
        return $this->belongsTo(JobSkill::class,'skill_id','id');
    }
}
