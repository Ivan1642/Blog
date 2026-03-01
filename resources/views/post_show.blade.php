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
        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" width="300">
    @endif

    <p>{{ $post->body }}</p>
    <br>
    <a href="{{ route('posts.edit', $post) }}">
        Editar
    </a>

    <form action="{{ route('posts.destroy', $post) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar este post?')">Eliminar</button>
    </form>
    <br>
    <br>
    <a href="{{ route('posts.index') }}">
        ← Volver a Posts
    </a>
    <hr>
    <h2>Comentarios ({{ $post->comments->count() }})</h2>

    @forelse($post->comments->sortByDesc('created_at') as $comment)
        <div>
            <p>{{ $comment->body }}</p>
            <small>
                Publicado el {{ $comment->created_at->format('d/m/Y H:i') }}
            </small>

            <form action="{{ route('comments.destroy', [$post, $comment]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar este comentario?')">Eliminar</button>
            </form>
        </div>
    @empty
        <p>No hay comentarios todavía.</p>
    @endforelse
    <hr>
    <h3>Dejar un comentario</h3>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <textarea name="body" rows="4" required>{{ old('body') }}</textarea>
        <br>
        <br>
        <button type="submit">Enviar comentario</button>
    </form>
@endsection