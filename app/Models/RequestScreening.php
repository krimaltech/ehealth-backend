<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestScreening extends Model
{
    use HasFactory;

    public function userpackage(){
        return $this->belongsTo(UserPackage::class);
    }
    public function screeningdate(){
        return $this->belongsTo(ScreeningDate::class);
    }
}
