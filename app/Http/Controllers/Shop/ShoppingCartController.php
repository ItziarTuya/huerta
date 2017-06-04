<?php

namespace huerta\Http\Controllers\Shop;

use Illuminate\Http\Request;
use huerta\Http\Controllers\Controller;
use huerta\ShoppingCart;

class ShoppingCartController extends Controller
{
    public function __construct()
    {
        $this->middleware('shoppingCartOwner');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShoppingCart $shoppingCart)
    {
        return view('shop.cart')->with('shoppingCart', $shoppingCart);
    }

    public function confirm(ShoppingCart $shoppingCart)
    {
        $shoppingCart->confirm();

        return redirect('/');
    }
}
