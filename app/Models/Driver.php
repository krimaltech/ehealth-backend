<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function user_key()
    {
        return $this->belongsTo(StoreToken::class, 'user_id');
    }
}