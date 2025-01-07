<?php

namespace App\Models\Newsmodel;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $connection = 'mysql2';

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
}