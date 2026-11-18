
@extends('layout')

@section('contenido')

<h2>Gestión de categorías</h2>
<p>Administra las categorías de tu biblioteca.</p>

<a href="{{ route('categorias.create') }}" class="btn">
    + Nueva categoría
</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad de libros</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->libros_count }}</td>
                <td>
                    <a href="{{ route('categorias.edit', $categoria) }}"
                       class="btn btn-warning">
                        Editar
                    </a>

                    <form action="{{ route('categorias.destroy', $categoria) }}"
                          method="POST"
                          style="display:inline;"
                          onsubmit="return confirm('¿Eliminar esta categoría?')">
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
                <td colspan="4" style="text-align:center;">
                    No hay categorías registradas.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
