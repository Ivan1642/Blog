<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('post_show', compact('post'));
    }
}
