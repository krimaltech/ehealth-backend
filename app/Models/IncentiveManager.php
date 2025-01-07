<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncentiveManager extends Model
{
    use HasFactory;
    public function incentivereceiver()
    {
        return $this->belongsTo(SubRole::class,'incentive_receiver');
    }
}
