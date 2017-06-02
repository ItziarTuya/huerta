<?php

namespace huerta\Http\Controllers\Customer;

use Illuminate\Http\Request;
use huerta\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Facades\Validator;

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


    public function update(Request $request)
    {
        $user = Auth::user();
        $data = array_diff($request->all(), $user->toArray());
        $validator = $this->validator($data);

        if ($validator->fails()) {
            return redirect('customer/edit')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $user->name = isset($data['name']) ? $data['name'] : $user->name;
            $user->email = isset($data['email']) ? $data['email'] : $user->email;
            $user->save();
        }

        return redirect('customer/index');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
        ]);
    }
}