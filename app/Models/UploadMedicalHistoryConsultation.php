<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadMedicalHistoryConsultation extends Model
{
    use HasFactory;

    public function medical_report()
    {
        return $this->hasMany(UploadMedicalHistory::class,'upload_medical_history_consultation_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class,'member_id');
    }
    public function doctor()
    {
        return $this->belongsTo(Employee::class,'doctor_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
}
