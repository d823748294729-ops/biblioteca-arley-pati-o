
@extends('layout')

@section('contenido')

<h2>Editar categoría</h2>
<p>Modifica el nombre de la categoría seleccionada.</p>

@if($errors->any())
    <div class="alert error">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categorias.update', $categoria) }}" method="POST">
    @csrf
    @method('PUT')

    <div style="margin-bottom:20px;">
        <label for="nombre">Nombre de la categoría:</label>
        <br>
        <input
            type="text"
            id="nombre"
            name="nombre"
            value="{{ old('nombre', $categoria->nombre) }}"
            style="width:95%;"
            required
        >
    </div>

    <button type="submit" class="btn">
        Guardar cambios
    </button>

    <a href="{{ route('categorias.index') }}"
       class="btn btn-warning">
        Cancelar
    </a>
</form>

@endsection
