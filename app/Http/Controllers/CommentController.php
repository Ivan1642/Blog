<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'body' => $request->body
        ]);

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post, Comment $comment)
    {
        if ($comment->post_id !== $post->id) {
            abort(404);
        }
        $comment->delete();
        return redirect()->route('posts.show', $post)->with('success', 'Comentario eliminado correctamente');
    }
}
