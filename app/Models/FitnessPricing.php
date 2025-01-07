<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FitnessPricing extends Model
{
    use HasFactory;

    public function fitnesstype():BelongsTo
    {
        return $this->belongsTo(FitnessType::class,'fitness_name_id');
    }
}
