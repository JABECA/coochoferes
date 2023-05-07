<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    use HasFactory;
     protected $fillable = [
                            'numero_interno',
                            'fecha',
                            'kilometraje',
                            'conductor',
                            'presion',
                            'labrado',
                            'tuercas',
                            'rines',
                            'repuesto',
                            'freno_parqueo',
                            'sistema_frenos',
                            'liquido_frenos',
                            'luz_reversa',
                            'luces_bajas',
                            'luces_altas',
                            'cucuyos',
                            'luces_freno',
                            'direccionales',
                            'nivel_conbustible',
                            'presion_aceite',
                            'nivel_bateria',
                            'nivel_temperatura',
                            'retrovisores',
                            'puertas',
                            'nivel_aceite',
                            'nivel_direccion',
                            'nivel_refrigerante',
                            'nivel_limpiabrisas',
                            'pito',
                            'limpiabrisas',
                            'tapa_radiador',
                            'correa_ventilador',
                            'bateria',
                            'conos_triangulos_tacos',
                            'herramientas',
                            'linterna_gato',
                            'cruceta_llave_pernos',
                            'extintor',
                            'salida_emergencia',
                            'botiquin',
                            'cinturones',
                            'velocimetro',
                            'aseo_general',
                            'conductor_uniformado',
                            'conductor_carnet',
                            'usr_supervisa',
                            'fecha_supervision',
                            'estado_planilla',
                            'estado_vehiculo'

                          ];
}
