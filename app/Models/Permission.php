<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public function roles()
    {
        return $this->hasMany(RolePermission::class);
    }

    public function categories()
    {
        return $this->hasMany(Permission::class, 'sub_category');
    }
}