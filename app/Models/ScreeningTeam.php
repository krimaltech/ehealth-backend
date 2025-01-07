<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScreeningTeam extends Model
{
    use HasFactory;
    public function screeningteamname()
    {
        return $this->belongsTo(ScreeningTeamName::class, 'screening_team_name_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department', 'id');
    }
    public function subrole()
    {
        return $this->belongsTo(SubRole::class, 'subrole_id', 'id');
    }
}
