<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //Total carts
    public function totalCarts()
    {
        if (Auth::check()){
            $carts = Cart::where('user_id', Auth::id())
                ->where('order_id', NULL)
                ->get();
        }else{
            $carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
        }
        return $carts;
    }

    //Total items in the cart
    public function totalItems()
    {
        if (Auth::check()){
            $carts = Cart::orWhere('user_id', Auth::id())
                ->where('order_id', NULL)
                ->get();
        }else{
            $carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
        }
        $total_item = 0;
        foreach ($carts as $cart) {
            $total_item += $cart->product_quantity;
        }
    return $total_item;
    }
}
