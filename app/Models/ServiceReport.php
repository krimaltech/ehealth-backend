<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceReport extends Model
{
    use HasFactory;

    protected $casts = [
        "value" => "decimal:1",
    ];

    public function book(){
        return $this->belongsTo(BookService::class);
    }

    public function test(){
        return $this->belongsTo(Test::class);
    }
}
