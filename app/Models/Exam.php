<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = ['id_conductor','tipo','descripcion','fecha_ini','fecha_fin','vigencia','usr_crea','estado'];
}
