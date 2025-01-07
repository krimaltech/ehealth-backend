<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivateStudent extends Model
{
    use HasFactory;
    
    public function profile(){
        return $this->belongsTo(CompanySchoolProfile::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function deactivate(){
        return $this->belongsTo(DeactivateStudentList::class,'deactivate_student_id','id');
    }
}
