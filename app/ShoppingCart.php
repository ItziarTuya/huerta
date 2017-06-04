<?php

namespace huerta;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
}
