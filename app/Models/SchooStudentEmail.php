<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchooStudentEmail extends Model
{
    use HasFactory;
    public function member()
    {
        return $this->belongsTo(Member::class,'member_id');
    }

    protected $fillable = [
        'member_id',
        'parent_email',
        'parent_phone',
        'year',
        'class',
        'section',
        'roll',
        'primary_member_id'
    ];

    protected $casts = [
        "parent_phone" => "integer",
        "year" => "integer",
        "class" => "integer",
        "roll" => "integer",
    ];
}
