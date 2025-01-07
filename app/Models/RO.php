<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RO extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'ro_id', 'id');
    }
}