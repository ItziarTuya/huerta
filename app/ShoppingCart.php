<?php

namespace huerta;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ShoppingCart extends Model
{
    protected $fillable = [
        'user_id', 'state',
    ];

    public function user()
    {
        return $this->belongsTo('huerta\User');
    }

    public function buyItems()
    {
        return $this->hasMany('huerta\BuyItem');
    }

    public static function getCurrentShoppingCart()
    {
        return self::where([
            ['state', '=', 1],
            ['user_id', '=', Auth::user()->id],
        ])->first();
    }

    public function getNumItems(){
        return $this->buyItems->sum('quantity');
    }

    public function getTotalPrice()
    {
        $totalPrice = 0;

        foreach ($this->buyItems as $buyItem)
        {
            $totalPrice += $buyItem->getTotalPrice();
        }

        return $totalPrice;
    }

    public function isPending()
    {
        return $this->state == 1;
    }

    public function confirm()
    {
        $this->state = 2;
        $this->confirmed_at = Carbon::now()->toDateTimeString();
        $this->save();
    }

    public function clear()
    {
        foreach ($this->buyItems as $buyItem) {     //$this->buyItems; Todos los productos del carrito.
            $product = $buyItem->product;
            $product->stock += $buyItem->quantity;  
            $product->save();
            $buyItem->delete();
        }
    }
}
