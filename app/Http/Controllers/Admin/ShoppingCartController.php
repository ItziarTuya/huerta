<?php

namespace huerta\Http\Controllers\Admin;

use Illuminate\Http\Request;
use huerta\Http\Controllers\Controller;
use huerta\ShoppingCart;

class ShoppingCartController extends AdminBaseController
{
    protected function index()
    {
        $shoppingCarts = ShoppingCart::paginate(5);
        return view('customer.orders' , ['shoppingCarts' => $shoppingCarts]);
    }
}
