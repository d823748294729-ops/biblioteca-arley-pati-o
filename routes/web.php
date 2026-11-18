
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return redirect()->route('libros.index');
});

Route::resource('libros', LibroController::class);

Route::resource('categorias', CategoriaController::class);
