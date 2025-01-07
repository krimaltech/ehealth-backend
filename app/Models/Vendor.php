<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'vendor_type',
        'file',
        'image',
        'address',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }
    public function types(){
        return $this->belongsTo(VendorType::class, 'vendor_type', 'id');
    }
    public function categories()
    {
        return $this->hasMany(Category::class,'vendor_id');
    }
    public function agreement(){
        return $this->hasOne(VendorAgreement::class, 'vendor_id', 'id');
    }
}
