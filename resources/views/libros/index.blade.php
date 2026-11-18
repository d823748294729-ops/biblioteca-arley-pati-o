
@extends('layout')

@section('contenido')

<h2>Gestión de libros</h2>
<p>Consulta, busca y administra los libros de tu biblioteca.</p>

<a href="{{ route('libros.create') }}" class="btn">
    + Registrar nuevo libro
</a>

<hr>

<h3>Buscar libros</h3>

<form action="{{ route('libros.index') }}" method="GET">
    <input
        type="text"
        name="buscar"
        placeholder="Buscar por título..."
        value="{{ request('buscar') }}"
    >

    <select name="categoria">
        <option value="">Todas las categorías</option>

        @foreach($categorias as $categoria)
            <option
                value="{{ $categoria->id }}"
                @selected(request('categoria') == $categoria->id)
            >
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select>

    <button type="submit" class="btn">Buscar</button>

    <a href="{{ route('libros.index') }}" class="btn">
        Limpiar
    </a>
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Categoría</th>
            <th>Disponible</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @forelse($libros as $libro)
            <tr>
                <td>{{ $libro->id }}</td>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->anio }}</td>
                <td>{{ $libro->categoria->nombre }}</td>

                <td>
                    {{ $libro->disponible ? 'Sí' : 'No' }}
                </td>

                <td>
                    <a
                        href="{{ route('libros.edit', $libro) }}"
                        class="btn btn-warning"
                    >
                        Editar
                    </a>

                    <form
                        action="{{ route('libros.destroy', $libro) }}"
                        method="POST"
                        style="display:inline;"
                        onsubmit="return confirm('¿Eliminar este libro?')"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align:center;">
                    No hay libros registrados.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<div style="margin-top:20px;">
    {{ $libros->links() }}
</div>

@endsection
