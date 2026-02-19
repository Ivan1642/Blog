@extends('layouts.app')

@section('title', 'Categorías')

@section('content')

    <h1>Listado de Categorías</h1>

    <a href="{{ route('categories.create') }}">
        Crear nueva categoría
    </a>

    <br><br>

    @if($categories->count())
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category) }}">Ver</a>
                            <br>
                            <a href="{{ route('categories.edit', $category) }}">Editar</a>
                            <br>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Eliminar esta categoría?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>

        {{ $categories->links() }}

    @else
        <p>No hay categorías creadas.</p>
    @endif

@endsection
