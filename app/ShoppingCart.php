<?php

namespace huerta;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ShoppingCart extends Model
{
    protected $fillable = [
        'user_id', 'state',
    ];


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
}
