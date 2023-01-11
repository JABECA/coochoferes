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
                           'fecha_registro', 
                           'valor_pasaje', 
                           'observaciones', 
                           'usr_crea',
                           'estado'
                          ];
}
