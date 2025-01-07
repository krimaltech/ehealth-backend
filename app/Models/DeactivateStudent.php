<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeactivateStudent extends Model
{
    use HasFactory;

    public function profile(){
        return $this->belongsTo(CompanySchoolProfile::class);
    }

    public function students(){
        return $this->hasMany(DeactivateStudentList::class,'deactivate_id');
    }
}
