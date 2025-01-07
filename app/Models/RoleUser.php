<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RoleUser extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'role_user';
    protected $fillable = [
        'user_id',
        'role_id',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function employee()
    {
        return $this->hasOne(Employee::class, 'employee_id');
    }
}
