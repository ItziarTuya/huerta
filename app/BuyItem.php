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
        return $this->belongsTo('huerta\Product');
    }

    public function getTotalPrice()
    {
        return $this->quantity * $this->product->price;
    }
}
