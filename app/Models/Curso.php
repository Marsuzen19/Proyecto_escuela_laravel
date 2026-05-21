<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    //Indico a laravel el nombre de mi tabla
    protected $table = 'cursos';

    protected $primaryKey = 'id_curso';

    protected $fillable = [
        'nombre_curso',
        'codigo_curso',
        'creditos',
        'descripcion',
        'foto' 
    ];
}