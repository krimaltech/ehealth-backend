<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookService extends Model
{
    use HasFactory;

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function tests(){
        return $this->hasMany(BookServiceTest::class);
    }

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function labreports()
    {
       return $this->hasMany(ServiceReport::class,'book_id','id');
    }

    public function lab(){
        return $this->belongsTo(Employee::class,'labtechnician_id','id');
    }

}
