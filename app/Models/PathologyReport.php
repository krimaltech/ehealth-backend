<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathologyReport extends Model
{
    use HasFactory;

    public function labtest()
    {
      return $this->belongsTo(LabTest::class,'test_id','id');
    }

    public function labvalue()
    {
      return $this->belongsTo(LabValue::class,'labvalue_id','id');
    }

    public function reportdetails()
    {
       return $this->belongsTo(MedicalReport::class,'report_id','id');
    }
}
