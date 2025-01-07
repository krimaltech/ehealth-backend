<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubRole extends Model
{
    use HasFactory;

    public function role(){
        return $this->belongsTo(Role::class,'role_id','id');
    }
     public function employee()
    {
        return $this->hasMany(Employee::class, 'sub_role_id', 'id');
    }
    public function screeningteam()
    {
        return $this->hasMany(ScreeningTeam::class, 'sub_role_id', 'id');
    }
    public function permission()
    {
        return $this->hasOne(RolePermission::class, 'sub_role_id');
    }
}
