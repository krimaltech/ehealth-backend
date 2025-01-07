<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    public function vacancyskill(){
        return $this->hasMany(VacancySkill::class,'vacancy_id','id');
    }

    public function visits(){
        return $this->hasMany(VacancyVisit::class,'vacancy_id','id');
    }
}
