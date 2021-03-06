<?php

namespace huerta;

use Illuminate\Database\Eloquent\Model;

class BuyItem extends Model
{
    protected $guarded = [];

    public function shoppingCart()
    {
        return $this->belongsTo('huerta\ShoppingCart');
    }

    public function product()
    {
        return $this->belongsTo('huerta\Product')->withTrashed();
    }

    public function getTotalPrice()
    {
        return $this->quantity * $this->buy_price;
    }

    public function getFormatedTotalPrice()
    {
        return number_format($this->getTotalPrice(), 2, '.', ',').' €';
    }
}
