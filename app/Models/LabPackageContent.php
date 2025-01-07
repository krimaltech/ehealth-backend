<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabPackageContent extends Model
{
    use HasFactory;

    public function labprofile(){
        return $this->belongsTo(LabProfile::class);
    }
    public function labtest(){
        return $this->belongsTo(LabTest::class);
    }
}
