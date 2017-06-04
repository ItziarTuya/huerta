<?php

namespace huerta\Http\Controllers\Shop;

use Illuminate\Http\Request;
use huerta\Http\Controllers\Controller;

class ShoppingCartController extends ShopBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.cart')->with('shoppingCart', $this->getShoppingCart());
    }
}
