@extends('layouts.app')

@section('title', 'Crear Post')

@section('content')

<h1>Crear Nuevo Post</h1>

{{-- Mostrar errores de validación --}}
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Título:</label>
    <input type="text" name="title" value="{{ old('title') }}">
    <br><br>

    <label>Categoría:</label>
    <select name="category_id">
        <option value="">-- Selecciona categoría --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Autor:</label>
    <select name="user_id">
        <option value="">-- Selecciona autor --</option>
        @foreach(\App\Models\User::all() as $user)
            <option value="{{ $user->id }}"
                {{ old('user_id') == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Extracto:</label>
    <textarea name="extract">{{ old('extract') }}</textarea>
    <br><br>

    <label>Contenido:</label>
    <textarea name="body">{{ old('body') }}</textarea>
    <br><br>

    <label>Imagen:</label>
    <input type="file" name="image_path">
    <br><br>

    <label>Tags:</label>
    <select name="tags[]" multiple>
        @foreach(\App\Models\Tag::all() as $tag)
            <option value="{{ $tag->id }}"
                {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>
                {{ $tag->name }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>
        <input type="checkbox" name="is_published" value="1"
            {{ old('is_published') ? 'checked' : '' }}>
        Publicar ahora
    </label>

    <br><br>

    <button type="submit">Crear Post</button>

</form>

@endsection
