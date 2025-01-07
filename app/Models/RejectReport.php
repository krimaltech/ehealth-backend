<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RejectReport extends Model
{
    use HasFactory;

    public function report(){
        return $this->belongsTo(MedicalReport::class,'report_id','id');
    }
}
