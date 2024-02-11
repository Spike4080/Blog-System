<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CatogeryController extends Controller
{
    public function index(Category $category)
    {
        return view('home', [
            'blogs' => $category->blogs()->with('category', 'user')->paginate(3), // fix n+1 problem afteer looping
            'title' => $category->name
        ]);
    }
}
