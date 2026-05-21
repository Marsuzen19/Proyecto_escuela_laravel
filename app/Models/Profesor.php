<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    //Ya que puse el nombre en español, asi le digo a laravel nombre exacto de mi tabla
    protected $table = 'profesores';

    //indica cual es el id verdadero de mi tabla en este caso le puse id_profesor
    protected $primaryKey = 'id_profesor';

    protected $fillable = [
    'nombre',
    'apellido',
    'fecha_nacimiento',
    'dni',
    'direccion',
    'telefono',
    'email',
    'especialidad',
    'foto' 
];
}
