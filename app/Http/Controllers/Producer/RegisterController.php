<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\RegisterController as RegisterBase;
use Illuminate\Support\Facades\Auth;

class RegisterController extends RegisterBase
{

	public function showRegistrationForm()
	{
	    session(['url.intended' => url()->previous()]);
	    return view('/producer/register');    
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data)
	{
	    return User::create([
	        'name' => $data['name'],
	        'email' => $data['email'],
	        'password' => bcrypt($data['password']),
	        'role' => 2,
	    ]);
	}
}