<?php

namespace huerta\Http\Controllers\Producer;

use huerta\Http\Controllers\Controller;
use huerta\User;
use huerta\Http\Controllers\Auth\RegisterController as RegisterBase;
use Illuminate\Support\Facades\Auth;

class RegisterController extends RegisterBase
{

	public function showRegistrationForm()
	{
	    session(['url.intended' => url()->previous()]);
	    return view('/producer.register');
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