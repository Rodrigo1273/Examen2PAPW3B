<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::all();
        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required|date',
        ]);

        Autor::create($request->all());
        return redirect()->route('autores.index');
    }

    public function edit($id)
    {
        $autor = Autor::find($id); 
        return view('autores.edit', compact('autor')); 
    }


    public function update(Request $request, Autor $autor)
{
    $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',
        'fecha_nacimiento' => 'required|date',
    ]);

    $autor->update($request->all());
    return redirect()->route('autores.index');
}


public function destroy(Autor $autor)
{
    $autor->delete();
    return redirect()->route('autores.index')->with('success', 'Autor eliminado exitosamente.');
}
}





