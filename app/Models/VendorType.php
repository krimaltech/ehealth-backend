<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorType extends Model
{
    use HasFactory;
    public function vendorType()
    {
        return $this->hasMany(Vendor::class, 'vendor_id');
    }
    public function vendorDetails()
    {
        return $this->hasMany(Vendor::class, 'vendor_type');
    }
    public function category()
    {
        return $this->hasMany(Category::class, 'vendor_type_id');
    }
}
