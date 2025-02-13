<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabPackage extends Model
{
    use HasFactory;

    public function labcontents(){
        return $this->hasMany(LabPackageContent::class,'labpackage_id','id');
    }
}
