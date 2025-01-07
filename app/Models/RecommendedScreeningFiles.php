<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommendedScreeningFiles extends Model
{
    use HasFactory;
    protected $casts = [
        'file_id' => 'array',
    ];
    public function file(){
        return $this->belongsTo(ScreeningRecommendFiles::class,'file_id');
    }
}
