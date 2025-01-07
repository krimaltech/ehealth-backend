<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineConsultationMeeting extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function doctor()
    {
        return $this->belongsTo(Employee::class, 'doctor_id');
    }
}
