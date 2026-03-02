@extends('layouts.app')

@section('title', 'Crear Tag')

@section('content')

<h1>Crear Nuevo Tag</h1>
<a href="{{ route('tags.index') }}">← Volver</a>
<br>
<br>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('tags.store') }}" method="POST">
    @csrf
    <label>Nombre:</label>
    <br>
    <input type="text" name="name" value="{{ old('name') }}" required>
    <br>
    <br>
    <button type="submit">Guardar</button>
</form>
@endsection