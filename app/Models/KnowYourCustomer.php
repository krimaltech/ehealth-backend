<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowYourCustomer extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function perm_province()
    {
        return $this->belongsTo(Province::class, 'perm_province_id');
    }
    public function perm_district()
    {
        return $this->belongsTo(District::class, 'perm_district_id');
    }
    public function perm_municipality()
    {
        return $this->belongsTo(Municipality::class, 'perm_municipality_id');
    }
  
    public function perm_ward()
    {
        return $this->belongsTo(Ward::class, 'perm_ward_id');
    }

    public function temp_province()
    {
        return $this->belongsTo(Province::class, 'temp_province_id');
    }
    public function temp_district()
    {
        return $this->belongsTo(District::class, 'temp_district_id');
    }
    public function temp_municipality()
    {
        return $this->belongsTo(Municipality::class, 'temp_municipality_id');
    }
  
    public function temp_ward()
    {
        return $this->belongsTo(Ward::class, 'temp_ward_id');
    }
}