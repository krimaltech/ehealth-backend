<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppAnalytics extends Model
{
    use HasFactory;

    public function counts(){
        return $this->hasMany(AppOpenCount::class,'app_id','id');
    }
}
