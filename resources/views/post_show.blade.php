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

    <p><strong>Autor:</strong> {{ User::find($post->user_id)->name }}</p>

    <p><strong>Publicado:</strong> {{ $post->published_at }}</p>

    @if($post->image_path)
        <img src="{{ asset($post->image_path) }}" alt="{{ $post->title }}">
    @endif

    <p>{{ $post->body }}</p>

    <a href="{{ route('posts.index') }}">Volver a Posts</a>
@endsection
