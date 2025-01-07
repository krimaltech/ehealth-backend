<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slots extends Model
{
    use HasFactory;
    protected $fillable = ['slot'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function bookings()
    {
        return $this->belongsTo(Booking::class, 'slot_id', 'id');
    }

    public function hospitals()
    {
        return $this->belongsTo(Hospital::class, 'hospital', 'id');
    }

    public function appointments()
    {
        return $this->hasOne(BookingReview::class, 'booking_id', 'id');
    }
}
