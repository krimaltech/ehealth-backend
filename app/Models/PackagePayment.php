<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePayment extends Model
{
    use HasFactory;

    public function userpack(){
        return $this->belongsTo(UserPackage::class,'userpackage_id','id');
    }
}
