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
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a>

                <a href="{{ route('posts.edit', $post) }}">
                    ✏ Editar
                </a>

                <br>
                <small>
                    @if($post->category)
                        Categoría: {{ $post->category->name }} |
                    @endif
                    Autor: {{ $post->user->name }}
                </small>

                <p>{{ $post->extract }}</p>
            </li>
        @endforeach
    </ul>

    {{ $posts->links() }} {{-- paginación --}}
@endsection

