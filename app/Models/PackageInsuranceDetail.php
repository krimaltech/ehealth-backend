<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageInsuranceDetail extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function userpackage(){
        return $this->belongsTo(UserPackage::class,'userpackage_id','id');
    }
}
