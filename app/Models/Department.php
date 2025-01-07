<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $casts = [
        'symptoms' => 'array',
    ];

    public function employee()
    {
        return $this->hasMany(Employee::class, 'department', 'id');
    }
    public function screeningteam()
    {
        return $this->hasMany(ScreeningTeam::class, 'department_id', 'id');
    }
}
