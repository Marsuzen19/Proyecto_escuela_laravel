<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
// Método para devolver todos los alumnos (Petición GET)
public function index()
{
$alumnos = Alumno::orderBy('id_alumno', 'desc')->get();
return response()->json($alumnos);
}
// Método para guardar un nuevo alumno (Petición POST)
public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'fecha_nacimiento' => 'required|date',
        'dni' => 'required|string|max:15|unique:alumno,dni',
        'direccion' => 'nullable|string|max:255',
        'telefono' => 'nullable|string|max:9',
        'email' => 'required|email|unique:alumno,email',
        'estado_matricula' => 'required|in:Matriculado,Inactivo',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
    ]);

    if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
        
        $ruta = $request->file('foto')->store('alumnos', 'public');
        $validated['foto'] = $ruta;
    }

    $alumno = Alumno::create($validated);

    return response()->json($alumno, 201);
}
}