<?php

namespace huerta\Http\Controllers\Shop;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use huerta\Http\Controllers\Controller;
use huerta\ShoppingCart;

class ShopBaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function getShoppingCart(Request $request)
    {
        if ($request->session()->has('shoppingCart')) {
            return $request->session()->get('shoppingCart');
        }

        $shoppingCart = $this->getShoppingCartFromDB();
        $request->session()->put('shoppingCart', $shoppingCart);

        return $shoppingCart;
    }

    private function getShoppingCartFromDB()
    {
        $shoppingCart = ShoppingCart::getCurrentShoppingCart();
        if (!is_null($shoppingCart)) {
            return $shoppingCart;
        }

        return ShoppingCart::create([
            'user_id' => Auth::user()->id,
            'state' => 1,
        ]);
    }
}
