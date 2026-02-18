@php
use App\Models\User;
@endphp

@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>

    @if($post->category)
        <p><strong>Categoría:</strong> {{ $post->category->name }}</p>
    @endif

    <p><strong>Autor:</strong> {{ $post->user->name }}</p>

    <p><strong>Publicado:</strong> {{ $post->published_at }}</p>

    @if($post->image_path)
        <img src="{{ asset('storage/' . $post->image_path) }}" 
             alt="{{ $post->title }}" 
             width="300">
    @endif

    <p>{{ $post->body }}</p>

    <br>

    <a href="{{ route('posts.edit', $post) }}">
        Editar
    </a>

    <br>

    <form action="{{ route('posts.destroy', $post) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar este post?')">
            Eliminar
        </button>
    </form>

    <br>
    <br>

    <a href="{{ route('posts.index') }}">
       < Volver a Posts
    </a>
@endsection
