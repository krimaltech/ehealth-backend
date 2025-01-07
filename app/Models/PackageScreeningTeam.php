<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageScreeningTeam extends Model
{
    use HasFactory;

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function screeningdate(){
        return $this->belongsTo(ScreeningDate::class,'screeningdate_id','id');
    }
}
