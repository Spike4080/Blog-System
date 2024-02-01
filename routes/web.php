<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $blogs = Blog::with('category')->orderBy('title')->get(); // fix n+1 problem before looping
    $title = "My Blog Title";
    return view('home', [
        'blogs' => $blogs,
        'title' => $title
    ]);
});

Route::get('/{blog:slug}', function (Blog $blog) {
    return view('blog-detail', [
        'blogs' => $blog
    ]);
});

// Find Category Route

Route::get('/categories/{category:id}', function (Category $category) {
    return view('home', [
        'blogs' => $category->blogs->load('category'), // fix n+1 problem afteer looping
        'title' => $category->name
    ]);
});

// Find User Route

Route::get('/users/{user:id}', function (User $user) {
    return view('home', [
        'blogs' => $user->blogs->load('user'), // fix n+1 problem afteer looping
        'title' => $user->name
    ]);
});
