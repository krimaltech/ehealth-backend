<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockManagement extends Model
{
    use HasFactory;
    public function stock_product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
