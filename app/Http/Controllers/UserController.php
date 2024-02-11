<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public  function index(User $user)
    {
        return view('home', [
            'title' => $user->name . "blogs",
            'blogs' => $user->blogs()->with('user', 'category')->paginate() // fix n+1 problem afteer looping
        ]);
    }
}
