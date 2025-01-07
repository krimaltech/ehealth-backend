<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScreeningTeamName extends Model
{
    use HasFactory;

    public function screeningteam()
    {
        return $this->belongsToMany(Employee::class, 'screening_teams', 'screening_team_name_id', 'employee_id');
        
    }

    public function screenteam()
    {
        return $this->hasMany(ScreeningTeam::class, 'screening_team_name_id', 'id');
        
    }
}
