<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppOpenCount extends Model
{
    use HasFactory;

    public function analytics(){
        return $this->belongsTo(AppAnalytics::class,'app_id','id');
    }
}
