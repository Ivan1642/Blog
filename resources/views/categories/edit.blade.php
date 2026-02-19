@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')

    <h1>Editar Categoría</h1>
    <a href="{{ route('categories.index') }}">< Volver al listado</a>
    <br>
    <br>

    @if ($errors->any())
        <div>
            <strong>Hay errores en el formulario:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nombre de la categoría:</label>
            <br>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
        </div>
        <br>
        <button type="submit">Editar Categoría</button>
    </form>

@endsection
