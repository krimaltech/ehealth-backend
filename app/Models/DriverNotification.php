<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverNotification extends Model
{
    use HasFactory;

    public function user_profile()
    {
        return $this->belongsTo(Member::class, 'user_id', 'id');
    }

    public function driver_profile()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }
}
