<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class vehiculos extends Model
{
    /** @use HasFactory<\Database\Factories\VehiculosFactory> */
    use HasFactory;

    protected $table = 'vehiculos';
    protected $fillable = [
        'numero_placa',
        'marca',
        'modelo',
        'tipo_vehiculo',
        'color',
        'capacidad',
        'tarifa_diaria',
        'estado'
    ];

}
