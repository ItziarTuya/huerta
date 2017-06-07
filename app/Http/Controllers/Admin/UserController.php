<?php

namespace huerta\Http\Controllers\Admin;

use Illuminate\Http\Request;
use huerta\Http\Controllers\Controller;
use huerta\User;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users', ['users' => User::paginate(5)]);
    }
}
