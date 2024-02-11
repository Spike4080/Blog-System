<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;

class BlogController extends Controller
{
    public function index()
    {

        $blogs = Blog::with('category', 'user')->orderBy('title')->filter(request(['search', 'username', 'category']))
            ->paginate(3)
            ->withQuerystring();

        // $blogs = Blog::with('category', 'user')->orderBy('title')->paginate(3); // fix n+1 problem before looping
        $title = "My Blog Title";
        return view('home', [
            'blogs' => $blogs,
            'title' => $title
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blog-detail', [
            'blogs' => $blog
        ]);
    }
}
