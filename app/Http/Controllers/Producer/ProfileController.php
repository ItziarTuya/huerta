<?php

namespace huerta\Http\Controllers\Producer;

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
        $this->middleware('producer');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $data = array_diff($request->all(), $user->toArray());
        $validator = $this->validator($data);

        if ($validator->fails()) {
            return redirect('user/edit')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $user->name = isset($data['name']) ? $data['name'] : $user->name;
            $user->email = isset($data['email']) ? $data['email'] : $user->email;
            $user->save();
        }

        return redirect('');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
        ]);
    }
}