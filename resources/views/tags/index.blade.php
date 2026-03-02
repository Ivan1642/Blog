@extends('layouts.app')

@section('title', 'Tags')

@section('content')

<h1>Listado de Tags</h1>

<a href="{{ route('tags.create') }}">Crear nuevo tag</a>

<br><br>

@if($tags->count())

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Creado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('tags.show', $tag) }}">Ver</a>
                        <a href="{{ route('tags.edit', $tag) }}">Editar</a>
                        <form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Eliminar este tag?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $tags->links() }}
@else
    <p>No hay tags creados.</p>
@endif
@endsection