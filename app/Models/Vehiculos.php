<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    use HasFactory;
    protected $fillable = [
                           'num_interno', 
                           'placa', 
                           'chasis', 
                           'carroceria', 
                           'modelo', 
                           'marca',
                           'img_frontal',
                           'img_posterior',
                           'img_laterald',
                           'img_laterali',
                           'cant_pasajeros', 
                           'motor', 
                           'tipo_combustible',
                           'num_SOAT',
                           'fec_venc_SOAT', 
                           'num_RTM', 
                           'fec_venc_RTM', 
                           'num_TOP', 
                           'ciudad_TOP', 
                           'fec_venc_TOP',
                           'id_propietario', 
                           'id_conductor', 
                           'observaciones', 
                           'usr_crea', 
                           'estado'
                          ];
}
