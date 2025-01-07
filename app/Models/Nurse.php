<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;
    protected $fillable = [
        'nmc_no',
        'gender',
        'nurse_type',
        'salutation',
        'qualification',
        'year_practiced',
        'image',
        'file',
        'address',
        'specialization',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'nurse_id', 'id');
    }
    public function shifts()
    {
        return $this->hasMany(NurseShift::class, 'nurse_id', 'id');
    }
}