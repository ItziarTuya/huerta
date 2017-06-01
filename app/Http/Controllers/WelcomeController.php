<?php

namespace huerta\Http\Controllers;

use Illuminate\Http\Request;
use huerta\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;


class WelcomeController extends Controller
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
                return view('producer.index', ['user' => Auth::user()]);

            } elseif (Auth::user()->isCustomer()) {
                return view('customer.index', ['user' => Auth::user()]);

            } else return view('home', ['user' => Auth::user()]);

        } else return view('welcome');
    }


    /**
     * Redirect to each navigation.
     *
     * @return void
     */
    protected function redirectTo()
    {
        if (Auth::user()->isProducer()) {
            return 'producer/index';

        } elseif (Auth::user()->isCustomer()) {
            return 'customer/index';

        } else return 'home';

        return '';
    }
}