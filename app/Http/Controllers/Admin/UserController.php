<?php

namespace huerta\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use huerta\Http\Controllers\Controller;
use huerta\User;

class UserController extends AdminBaseController
{
    public function index()
    {
        return view('admin.users', [
            'users' => User::where('role', '!=', 3)->withTrashed()->paginate(5),
            'roleNames' => [1 => 'customer', 2 => 'producer']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user_edit', ['user' => $user]);
    }


    public function update(Request $request, User $user)
    {
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

        return redirect('admin/users');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
        ]);
    }

    public function restore(int $id)
    {
        $user = User::withTrashed()->find($id);

        if (!is_null($user)) {
            $user->restore();
        }

        return back();
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return back();
    }
}
