@extends('layouts.app')

@section('title', $tag->name)

@section('content')

<h1>Detalle del Tag</h1>
<p><strong>Nombre:</strong> {{ $tag->name }}</p>
<p><strong>Creado:</strong> {{ $tag->created_at->format('d/m/Y H:i') }}</p>
<br>
<a href="{{ route('tags.edit', $tag) }}">Editar</a>
<form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('¿Eliminar este tag?')">Eliminar</button>
</form>
<br>
<br>
<a href="{{ route('tags.index') }}">← Volver al listado</a>
@endsection