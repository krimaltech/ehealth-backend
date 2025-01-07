<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FitnessBooking extends Model
{
    use HasFactory;
    public function fitnessprice():BelongsTo
    {
        return $this->belongsTo(FitnessPricing::class,'membership_type');
    }
}
