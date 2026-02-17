@php
use App\Models\User;
@endphp

@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1>Posts</h1>

    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                <br>
                <small>
                    @if($post->category)
                        Categoría: {{ $post->category->name }} |
                    @endif
                    Autor: {{ User::find($post->user_id)->name }} |
                    Publicado: {{ $post->published_at }}
                </small>
                <p>{{ $post->extract }}</p>
            </li>
        @endforeach
    </ul>

    {{ $posts->links() }} {{-- paginación --}}
@endsection

