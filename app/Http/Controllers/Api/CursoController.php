<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // GET: Listar todos los cursos
    public function index()
    {
        $cursos = Curso::orderBy('id_curso', 'desc')->get();
        return response()->json($cursos);
    }

    // POST: Guardar un nuevo curso con foto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_curso' => 'required|string|max:255',
            'codigo_curso' => 'required|string|max:50|unique:cursos,codigo_curso',
            'creditos'     => 'required|integer|min:1|max:10',
            'descripcion'  => 'nullable|string|max:500',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048' 
        ]);

        // Procesar y guardar la imagen 
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            // Se guardará en storage/app/public/cursos
            $ruta = $request->file('foto')->store('cursos', 'public');
            $validated['foto'] = $ruta;
        }

        $curso = Curso::create($validated);

        return response()->json($curso, 201);
    }


}