<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class WriteController extends Controller
{
    public function create()
    {
        return view('write');
    }

    public function store()
    {
        $post = new Blog();
        $post->title = request('title');
        $post->slug = request('slug');
        $post->intro = request('intro');
        $post->body = request('body');
        $post->category_id = request('category_id');
        $post->user_id = request('user_id');
        $post->save();

        return redirect('/');
    }
}
