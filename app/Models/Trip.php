<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    public function driverDetail()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
    public function user_key()
    {
        return $this->belongsTo(StoreToken::class, 'user_id', 'user_id');
    }
    public function driver_key()
    {
        return $this->belongsTo(StoreToken::class, 'driver_id', 'user_id');
    }
    public function user_address()
    {
        return $this->belongsTo(DriverNotification::class, 'notification_id');
    }
    public function ambulance_fare()
    {
        return $this->belongsTo(AmbulanceRate::class, 'ambulamce_fare_id');
    }
    public function driverProfile()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
    public function userProfile()
    {
        return $this->belongsTo(Member::class, 'user_id');
    }
}