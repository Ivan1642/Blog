<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')
            ->latest()
            ->paginate(5);

        return view('posts', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('post_show', compact('post'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post_create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->validated();

        $post = Post::create([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'extract' => $data['extract'] ?? null,
            'body' => $data['body'],
            'category_id' => $data['category_id'] ?? null,
            'user_id' => $data['user_id'] ?? null,
            'is_published' => $request->has('is_published'),
        ]);

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post_edit', compact('post', 'categories'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')
                ->store('posts', 'public');
        }

        $data['is_published'] = $request->has('is_published');

        if ($data['is_published']) {
            $data['published_at'] = now();
        } else {
            $data['published_at'] = null;
        }

        $post->update($data);

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}