@extends('layouts.app')

@section('title', 'Crear Categoría')

@section('content')

    <h1>Crear Nueva Categoría</h1>
    <a href="{{ route('categories.index') }}">< Volver al listado</a>
    <br>
    <br>

    @if ($errors->any())
        <div style="color: red;">
            <strong>Hay errores en el formulario:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nombre de la categoría:</label>
            <br>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        <br>
        <button type="submit">Crear Categoría</button>
    </form>

@endsection
