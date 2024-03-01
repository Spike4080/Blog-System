<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogUser;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Blog $blog)
    {
        if (auth()->user()->isSubscribed($blog)) {
            $blog->subscribeUsers()->detach(auth()->id());
        } else {
            $blog->subscribeUsers()->attach(auth()->id());
        }
        return back();
    }
}
