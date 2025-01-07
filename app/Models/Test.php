<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $casts = [
        "male_min_range" => "decimal:1",
        "male_max_range" => "decimal:1",
        "female_min_range" => "decimal:1",
        "female_max_range" => "decimal:1",
        "child_min_range" => "decimal:1",
        "child_max_range" => "decimal:1",
    ];

    public function service()
    {
       return $this->belongsTo(Service::class);
    }
}
