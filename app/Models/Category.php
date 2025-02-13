<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{ 
    use HasFactory;
    public function parents()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    // for children category products
    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenCategory()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('categories');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id');
    }
    public function brands()
    {
        return $this->belongsTo(Product::class, 'id');
    }
}
