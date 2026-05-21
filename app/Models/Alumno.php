<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    // pongo protect table porque laravel espera el nombre en plural pero la tabla esta en singular

    protected $table = 'alumno'; 

    protected $primaryKey = 'id_alumno';

    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'dni',
        'direccion',
        'telefono',
        'email',
        'estado_matricula',
        'foto'
    ];
}