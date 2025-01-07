<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;
    protected $casts = ['permission_id' => 'array'];

    public function role_type()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function sub_role_type()
    {
        return $this->belongsTo(SubRole::class,'sub_role_id');
    }

    
    public function permission()
    {
        return $this->hasMany(Permission::class,'permission_id');
    }
}
