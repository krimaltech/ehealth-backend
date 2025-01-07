<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    const PAYMENT_COMPLETED = 1;
    const PAYMENT_PENDING = 0;
    protected $table = 'orders';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id', 'total_amount', 'payment_status'];
    public function cart_info(){
        return $this->hasMany(Cart::class,'order_id','id');
    }
    public static function getAllOrder($id){
        return Order::with('cart_info')->find($id);
    }
    public static function countActiveOrder(){
        $data=Order::count();
        if($data){
            return $data;
        }
        return 0;
    }
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
