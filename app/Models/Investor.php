<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;
    public function member()
    {
        return $this->belongsTo(Member::class, 'user_id');
    }
}
