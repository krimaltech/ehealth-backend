<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineDoctorConsultation extends Model
{
    use HasFactory;

    public function doctor(){
        return $this->belongsTo(Employee::class,'doctor_id','id');
    }
    public function report(){
        return $this->belongsTo(MedicalReport::class,'medicalreport_id','id');
    }
    public function member(){
        return $this->belongsTo(Member::class,'member_id','id');
    }
}
