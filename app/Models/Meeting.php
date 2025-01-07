<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $fillable= ['topic','start_time','agenda','join_url','status','user_id'];
    protected $casts = [
        'join_url' => 'array',
    ];
}
