<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
        // GET: listar profesores
    public function index()
    {
        $profesores = Profesor::orderBy('id_profesor', 'desc')->get();
        return response()->json($profesores);
    }

        // POST: guardar profesor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'dni' => 'required|string|max:8|unique:profesores,dni',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:9',
            'email' => 'required|email|unique:profesores,email',
            'especialidad' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        //  Guardar imagen
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $ruta = $request->file('foto')->store('profesores', 'public');
            $validated['foto'] = $ruta;
        }

        $profesor = Profesor::create($validated);

        return response()->json($profesor, 201);
    }
}
