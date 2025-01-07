<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScreeningReport extends Model
{
    use HasFactory;

    public function reportdetail()
    {
       return $this->belongsTo(MedicalReport::class,'report_id','id');
    }
}
