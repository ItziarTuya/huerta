<?php

namespace huerta\Http\Controllers\Shop;

use Illuminate\Http\Request;
use huerta\Http\Controllers\Controller;
use huerta\ShoppingCart;

use huerta\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use huerta\Product;
use huerta\BuyItem;


class ShoppingCartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

        return redirect('shop/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \huerta\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function clear(ShoppingCart $shoppingCart)
    {
        $shoppingCart->clear();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \huerta\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function subtract(ShoppingCart $shoppingCart, BuyItem $buyItem)
    {
        $shoppingCart->subtract($buyItem);

        return back();
    }
}
