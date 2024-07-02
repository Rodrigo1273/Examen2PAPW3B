<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::with('autor')->get();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        $autores = libro::all();
        return view('libros.create', compact('autores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'fecha_publicacion' => 'required|date',
            'autor_id' => 'required|exists:autores,id',
            'precio' => 'required|numeric',
        ]);

        Libro::create($request->all());
        return redirect()->route('libros.index');
    }

    public function edit(Libro $libro)
    {
        $autores = libro::all();
        return view('libros.edit', compact('libro', 'autores'));
    }

    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required',
            'fecha_publicacion' => 'required|date',
            'autor_id' => 'required|exists:autores,id',
            'precio' => 'required|numeric',
        ]);

        $libro->update($request->all());
        return redirect()->route('libros.index');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index');
    }
}
