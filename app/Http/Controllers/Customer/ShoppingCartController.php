<?php

namespace huerta\Http\Controllers\Customer;

use Illuminate\Http\Request;
use huerta\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use huerta\ShoppingCart;

class ShoppingCartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    protected function orders()
    {
    	$shoppingCarts = ShoppingCart::getShoppingCarts();
        return view('customer.orders' , ['shoppingCarts' => $shoppingCarts]);
    }
}