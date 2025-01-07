<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadReport extends Model
{
    use HasFactory;

    public function reportfiles(){
        return $this->hasMany(ReportFile::class,'report_id','id');
    }

    public function departments(){
        return $this->belongsTo(Department::class,'department','id');
    }
}
