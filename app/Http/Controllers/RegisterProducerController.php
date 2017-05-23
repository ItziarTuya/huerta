<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

class RegisterProducerController extends RegisterController
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