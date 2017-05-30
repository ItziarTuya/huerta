<?php

namespace huerta\Http\Controllers\Customer;

use Illuminate\Http\Request;
use huerta\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;  

class ProfileController extends Controller
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('customer.index', ['user' => $request->user()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('customer.edit', ['user' => Auth::user()]);
    }
}