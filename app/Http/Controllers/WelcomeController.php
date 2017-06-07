<?php

namespace huerta\Http\Controllers;

use Illuminate\Http\Request;
use huerta\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use huerta\Http\Controllers\Shop\ShopBaseController;


class WelcomeController extends ShopBaseController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()){

            if (Auth::user()->isProducer()) {
                return view('producer.index', ['user' => Auth::user(),'shoppingCart' => $this->getShoppingCart()]);

            } elseif (Auth::user()->isCustomer()) {
                return view('customer.index', ['user' => Auth::user(),'shoppingCart' => $this->getShoppingCart()]);
            }

            return view('welcome');

        } else return view('welcome');
    }
}
