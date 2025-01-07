<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwitchCampaignEmployee extends Model
{
    use HasFactory;

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function newemployee(){
        return $this->belongsTo(Employee::class,'new_employee_id','id');
    }
}
