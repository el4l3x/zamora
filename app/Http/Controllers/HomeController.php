<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function posts()
    {
        $posts = Post::where('status', 2)->get();

        return view('Home.posts', [
            'posts' => $posts,
        ]);
    }

    public function landing()
    {
        $posts = Post::where('status', 2)->latest('id')->take(4)->get();

        return view('Home.landing', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
        return view('Home.single', [
            'post' => $post,
        ]);
    }
}
