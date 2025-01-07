<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthenticationLog extends Model
{
    use HasFactory;
    protected $table='authentication_log';

    public function user(){
        return $this->belongsTo(User::class,'authenticatable_id','id');
    }
}
