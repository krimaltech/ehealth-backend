<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FollowUp extends Model
{
    use HasFactory;

    public function followupdate():BelongsTo
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
}
