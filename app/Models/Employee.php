<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'employee_type',
        'file',
        'image',
        'address',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
    public function employeeAsUser()
    {
        return $this->belongsTo(User::class, 'is_user', 'id');
    }
    public function types()
    {
        return $this->belongsTo(EmployeeType::class, 'employee_type', 'id');
    }
    public function screeningteam()
    {
        return $this->hasMany(ScreeningTeam::class, 'screening_team_id', 'id');
    }
    public function departments()
    {
        return $this->belongsTo(Department::class, 'department', 'id');
    }
    public function subrole()
    {
        return $this->belongsTo(SubRole::class, 'sub_role_id', 'id');
    }
}
