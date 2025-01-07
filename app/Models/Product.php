<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $casts = [
        'tags' => 'array',
        "averageRating" => "decimal:1"
    ];
    public function parents(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subCategory(){
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function gallery(){
        return $this->hasMany(Gallery::class,'product_id');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function vendor_details()
    {
        return $this->belongsTo(Vendor::class,'vendor_id');
    }
    public function brand_detail()
    {
        return $this->belongsTo(Brand::class,'brand');
    }
}
