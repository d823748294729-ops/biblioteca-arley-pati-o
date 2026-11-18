
@extends('layout')

@section('contenido')

<h2>Registrar nuevo libro</h2>
<p>Completa los siguientes datos para agregar un libro.</p>

@if ($errors->any())
    <div class="alert error">
        <strong>Corrige los siguientes errores:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('libros.store') }}" method="POST">
    @csrf

    <div style="margin-bottom: 15px;">
        <label for="titulo">Título del libro:</label>
        <br>
        <input type="text" id="titulo" name="titulo"
               value="{{ old('titulo') }}"
               style="width: 95%;" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="autor">Autor:</label>
        <br>
        <input type="text" id="autor" name="autor"
               value="{{ old('autor') }}"
               style="width: 95%;" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="anio">Año de publicación:</label>
        <br>
        <input type="number" id="anio" name="anio"
               min="1000" max="2100"
               value="{{ old('anio') }}"
               style="width: 95%;" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="categoria_id">Categoría:</label>
        <br>
        <select id="categoria_id" name="categoria_id"
                style="width: 97%;" required>
            <option value="">Selecciona una categoría</option>

            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}"
                    @selected(old('categoria_id') == $categoria->id)>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div style="margin-bottom: 20px;">
        <input type="checkbox" id="disponible"
               name="disponible" value="1"
               @checked(old('disponible', true))>
        <label for="disponible">Libro disponible</label>
    </div>

    <button type="submit" class="btn">
        Guardar libro
    </button>

    <a href="{{ route('libros.index') }}" class="btn btn-warning">
        Cancelar
    </a>
</form>

@endsection
