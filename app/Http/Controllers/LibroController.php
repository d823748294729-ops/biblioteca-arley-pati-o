<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Categoria;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $libros = Libro::with('categoria')
            ->buscar($request->input('buscar'))
            ->filtrarCategoria($request->input('categoria'))
            ->orderBy('titulo')
            ->paginate(10)
            ->withQueryString();

        $categorias = Categoria::orderBy('nombre')->get();

        return view('libros.index', compact('libros', 'categorias'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();

        return view('libros.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas());

        $datos['disponible'] = $request->boolean('disponible');

        Libro::create($datos);

        return redirect()->route('libros.index')
            ->with('success', 'Libro registrado correctamente.');
    }

    public function show(Libro $libro)
    {
        return redirect()->route('libros.index');
    }

    public function edit(Libro $libro)
    {
        $categorias = Categoria::orderBy('nombre')->get();

        return view('libros.edit', compact('libro', 'categorias'));
    }

    public function update(Request $request, Libro $libro)
    {
        $datos = $request->validate($this->reglas());

        $datos['disponible'] = $request->boolean('disponible');

        $libro->update($datos);

        return redirect()->route('libros.index')
            ->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index')
            ->with('success', 'Libro eliminado correctamente.');
    }

    private function reglas(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'anio' => 'required|integer|between:1000,2100',
            'categoria_id' => 'required|exists:categorias,id',
            'disponible' => 'sometimes|boolean',
        ];
    }
}
