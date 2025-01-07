<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NurseShift extends Model
{
    use HasFactory;
    public function nurse(){
        return $this->belongsTo(Nurse::class);
    }
}
