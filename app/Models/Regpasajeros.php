<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regpasajeros extends Model
{
    use HasFactory;
    protected $fillable = [
                           'num_interno', 
                           'cant_pasajeros',
                           'cant_pasajeros_terminal',
                           'ruta',
                           'fecha_registro',
                           'hora_registro', 
                           'fecha_recaudo',
                           'valor_pasaje',
                           'total_cuadre',
                           'cod_recaudo',
                           'observaciones', 
                           'usr_crea',
                           'usr_recaudo',
                           'estado'
                          ];
}
