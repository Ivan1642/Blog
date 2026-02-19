@extends('layouts.app')

@section('title', $category->name)

@section('content')

    <h1>Detalle de la Categoría</h1>
    <a href="{{ route('categories.index') }}">< Volver al listado</a>
    <br>
    <br>
    <p>
        <strong>Nombre:</strong> {{ $category->name }}
    </p>

    <p>
        <strong>Creada el:</strong>
        {{ $category->created_at->format('d/m/Y H:i') }}
    </p>
    <br>
    <a href="{{ route('categories.edit', $category) }}">Editar</a>

    <form action="{{ route('categories.destroy', $category) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Eliminar esta categoría?')">Eliminar</button>
    </form>

@endsection
