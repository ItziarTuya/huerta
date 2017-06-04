<?php

namespace huerta;

use Illuminate\Database\Eloquent\Model;

class BuyItem extends Model
{
    protected $guarded = [];

    public function shopingCart()
    {
        return $this->hasOne('huerta\ShopingCart');
    }
}
