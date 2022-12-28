<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
                            'nombres',
                            'apellidos',
                            'identificacion',
                            'fecha_expedicion',
                            'lugar_expedicion',
                            'fecha_nacimiento',
                            'direccion',
                            'ciudad',
                            'celular',
                            'fec_ingreso',
                            'tipo_contrato',
                            'fec_contrato',
                            'fec_term_contrato',
                            'asociado',
                            'curso_cooperativismo',
                            'nivel_educativo',
                            'estado_civil',
                            'categoria_licencia',
                            'fec_venc_licencia',
                            'restric_licencia',
                            'rh',
                            'EPS',
                            'ARL',
                            'AFP',
                            'fondo_cesantias',
                            'exp_conduccion',
                            'propietario',
                            'conductor',
                            'estado',
                            'observaciones'
                          ];
}
