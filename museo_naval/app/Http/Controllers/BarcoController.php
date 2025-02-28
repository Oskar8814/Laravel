<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barco;
use Illuminate\Support\Facades\Storage;


class BarcoController extends Controller {
    public function index(Request $request) {

        $query = Barco::query();

        // Si hay un término de búsqueda, filtramos por nombre
        if ($request->has('search')) {
            $query->where('nombre', 'like', '%' . $request->search . '%');
        }

        $barcos = $query->paginate(6); // Mostramos 6 barcos por página o la busqueda
        //$barcos = Barco::paginate(6);  Mostramos 6 barcos por página
        //$barcos = Barco::all();  Obtener todos los barcos
        return view('dashboard', compact('barcos')); // Pasar los datos a la vista del dashboard
    }

    public function edit($id) {
        $barco = Barco::findOrFail($id); // Busca el barco por ID
    
        return view('barcos.edit', compact('barco')); // Devuelve la vista de edición
    }

    public function update(Request $request, $id) {
        $barco = Barco::findOrFail($id);
    
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'clase' => 'required|string|max:255',
            'nacionalidad' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // La imagen es opcional en el update
        ]);
    
        // Si se ha subido una nueva imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($barco->imagen) {
                Storage::disk('public')->delete($barco->imagen);
            }
    
            // Obtener el nombre original del archivo de la nueva imagen
            $imagenOriginal = $request->file('imagen')->getClientOriginalName();
    
            // Guardar la nueva imagen con el nombre original
            $imagenPath = $request->file('imagen')->storeAs('barcos', $imagenOriginal, 'public');
    
            // Actualizar el campo imagen en la base de datos
            $barco->imagen = $imagenPath;
        }
    
        // Actualizamos todos los campos excepto la imagen
        $barco->update($request->except(['imagen']));
    
        return redirect()->route('dashboard')->with('success', 'Barco actualizado correctamente.');
    }
    

    public function destroy($id) {
        $barco = Barco::findOrFail($id);
    
        // Si el barco tiene una imagen, la eliminamos del almacenamiento
        if ($barco->imagen) {
            Storage::disk('public')->delete($barco->imagen);
        }
    
        $barco->delete(); // Eliminamos el barco de la base de datos
    
        return redirect()->route('dashboard')->with('success', 'Barco eliminado correctamente.');
    }    

    public function create() {
        return view('barcos.create'); // Devuelve la vista 'barcos.create' para mostrar el formulario
    }
    
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'clase' => 'required|string|max:255',
            'nacionalidad' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $imagenOriginal = $request->file('imagen')->getClientOriginalName();
            $imagenPath = $request->file('imagen')->storeAs('barcos', $imagenOriginal, 'public');
        } else {
            $imagenPath = null;
        }

        Barco::create([
            'nombre' => $request->nombre,
            'clase' => $request->clase,
            'nacionalidad' => $request->nacionalidad,
            'descripcion' => $request->descripcion,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Barco creado correctamente.');
    }
}

