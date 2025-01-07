<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeactivateStudentList extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function activate(){
        return $this->hasMany(ActivateStudent::class,'deactivate_student_id','id');
    }

    public function activated(){
        return $this->hasOne(ActivateStudent::class,'deactivate_student_id','id')->latest();
    }
}
