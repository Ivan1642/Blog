@extends('layouts.app')

@section('title', 'Editar Tag')

@section('content')

<h1>Editar Tag</h1>
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
<form action="{{ route('tags.update', $tag) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nombre:</label>
    <br>
    <input type="text" name="name" value="{{ old('name', $tag->name) }}" required>
    <br>
    <br>
    <button type="submit">Actualizar</button>
</form>
@endsection