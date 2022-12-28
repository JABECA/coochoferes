<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insidente extends Model
{
    use HasFactory;
    protected $fillable = ['num_interno', 'placa', 'tipo', 'descripcion', 'fecha', 'duracion', 'solucion', 'estado', 'usr_crea' ];
}
