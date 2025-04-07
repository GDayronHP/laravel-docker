<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libros;

class LibrosController extends Controller
{

    public function listar()
    {

        $libros = Libros::all();
        return view('libros.listar', compact('libros'));
    }

    public function crear()
    {
        return view('libros.crear');
    }

    public function guardar(Request $request)
    {
        // Validación de datos
        $request->validate([
            'isbn' => 'required|string|max:13',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        // Guardar el libro en la base de datos
        $libro = new Libros();
        $libro->isbn = $request->input('isbn');
        $libro->nombre = $request->input('nombre');
        $libro->descripcion = $request->input('descripcion');

        // Guardar el libro
        $libro->save();

        return redirect()->route('libros.listar')->with('status', 'Libro creado correctamente');
    }

    public function editar($isbn)
    {
        // Obtener el libro por el ISBN
        $libro = Libros::where('isbn', $isbn)->first();

        if (!$libro) {
            return redirect()->route('libros.listar')->with('error', 'Libro no encontrado');
        }

        return view('libros.actualizar')->with('libro', $libro);
    }
    public function actualizar(Request $request, $isbn)
    {
        // Validación de datos
        $request->validate([
            'isbn' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        // Obtener el libro a editar
        $Libro = Libros::where('isbn', $isbn)->first();

        if (!$Libro) {
            return redirect()->route('libros.listar')->with('error', 'Libro no encontrado');
        }

        $Libro->isbn = $request->input('isbn');
        $Libro->nombre = $request->input('nombre');
        $Libro->descripcion = $request->input('descripcion');

        // Guardar los cambios
        $Libro->save();

        return redirect()->route('libros.listar')->with('status', 'Libro editado correctamente');
    }

    public function eliminar($isbn)
    {

        // Obtener el libro a eliminar
        $libro = Libros::where('isbn', $isbn);
        if (!$libro) {
            return redirect()->route('libros.listar')->with('error', 'Libro no encontrado');
        }
        // Eliminar el libro
        $libro->delete();
        return redirect()->route('libros.listar')->with('status', 'Libro eliminado correctamente');
    }
}
