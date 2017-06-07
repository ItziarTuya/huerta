<?php

namespace huerta\Http\Controllers\Admin;

use Illuminate\Http\Request;
use huerta\Http\Controllers\Controller;

class AdminBaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
}
