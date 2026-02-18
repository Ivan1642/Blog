@extends('layouts.app')

@section('content')

<h1>Editar Post</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Título</label>
    <input type="text" name="title"
        value="{{ old('title', $post->title) }}">
    <br><br>

    <label>Categoría</label>
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Autor</label>
    <select name="user_id">
        @foreach(\App\Models\User::all() as $user)
            <option value="{{ $user->id }}"
                {{ old('user_id', $post->user_id) == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Extracto</label>
    <textarea name="extract">{{ old('extract', $post->extract) }}</textarea>
    <br><br>

    <label>Contenido</label>
    <textarea name="body">{{ old('body', $post->body) }}</textarea>
    <br><br>

    <label>Imagen</label>
    <input type="file" name="image_path">
    <br>

    @if($post->image_path)
        <p>Imagen actual:</p>
        <img src="{{ asset('storage/' . $post->image_path) }}" width="150">
    @endif
    <br><br>

    <label>
        <input type="checkbox" name="is_published" value="1"
            {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
        Publicado
    </label>

    <br>
    <br>

    <button type="submit">Actualizar Post</button>

</form>

@endsection
