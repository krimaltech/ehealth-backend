<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelationManager extends Model
{
    use HasFactory;
    public function relation_manager()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function employee_code()
    {
        return $this->belongsTo(Employee::class,'marketing_supervisor_id','id');
    }
}
