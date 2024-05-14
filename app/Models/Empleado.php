<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'primer_apellido',
        'segundo_apellido',
        'primer_nombre',
        'otros_nombres',
        'pais_del_empleo',
        'tipo_identificacion',
        'numero_identificacion',
        'correo_electronico',
        'fecha_ingreso',
        'area',
        'estado',
    ];
}


