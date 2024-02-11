<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        //backend validation / pass->run another code / fail -> auto redirect back
        request()->validate([
            'name' => ['required', 'max:20'],
            'username' => ['required', 'max:20', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'max:30']
        ]);

        // register
        $user = new User();
        $user->name = request('name');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();

        auth()->login($user);
        return redirect('/');
    }
}
