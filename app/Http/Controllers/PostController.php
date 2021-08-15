<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::limit(6)->get();

        return view('home', [
            'posts' => $posts
        ]);
    }

    public function article(int $id)
    {
        $post = Post::where('id', $id)->with('user')->firstOrFail();

        return view('article', [
            'post' => $post
        ]);
    }
}
