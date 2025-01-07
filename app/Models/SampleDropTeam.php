<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleDropTeam extends Model
{
    use HasFactory;

    public function screeningdate(){
        return $this->belongsTo(ScreeningDate::class);
    }
    public function medicalreport(){
        return $this->belongsTo(MedicalReport::class);
    }
    public function familyname(){
        return $this->belongsTo(FamilyName::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
