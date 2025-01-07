<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScreeningTest extends Model
{
    use HasFactory;

    public function labtest(){
        return $this->belongsTo(LabTest::class);
    }
}
