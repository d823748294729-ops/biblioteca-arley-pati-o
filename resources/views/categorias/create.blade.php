
@extends('layout')

@section('contenido')

<h2>Registrar nueva categoría</h2>
<p>Escribe el nombre de la categoría que deseas agregar.</p>

@if($errors->any())
    <div class="alert error">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categorias.store') }}" method="POST">
    @csrf

    <div style="margin-bottom:20px;">
        <label for="nombre">Nombre de la categoría:</label>
        <br>
        <input type="text"
               id="nombre"
               name="nombre"
               value="{{ old('nombre') }}"
               placeholder="Ejemplo: Ciencia ficción"
               style="width:95%;"
               required>
    </div>

    <button type="submit" class="btn">
        Guardar categoría
    </button>

    <a href="{{ route('categorias.index') }}"
       class="btn btn-warning">
        Cancelar
    </a>
</form>

@endsection
