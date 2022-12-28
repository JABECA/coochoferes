<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('identificacion', 20);
            $table->date('fecha_expedicion')->nullable();
            $table->string('lugar_expedicion', 50)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('ciudad', 50)->nullable();
            $table->string('celular', 30)->nullable();
            $table->date('fec_ingreso')->nullable();
            $table->string('tipo_contrato', 50)->nullable();
            $table->date('fec_contrato')->nullable();
            $table->date('fec_term_contrato')->nullable();
            $table->string('asociado', 4)->nullable();
            $table->string('curso_cooperativismo', 4)->nullable();
            $table->string('nivel_educativo', 50)->nullable();
            $table->string('estado_civil', 30)->nullable();
            //documentos solicitador para el conductor
            $table->string('categoria_licencia', 10)->nullable();
            $table->date('fec_venc_licencia')->nullable();
            $table->string('restric_licencia', 100)->nullable();
            $table->string('rh', 5)->nullable();
            $table->string('EPS', 50)->nullable();
            $table->string('ARL', 50)->nullable();
            $table->string('AFP', 50)->nullable();
            $table->string('fondo_cesantias', 50)->nullable();
            $table->string('exp_conduccion', 50)->nullable();

            $table->string('propietario', 10)->nullable();
            $table->string('conductor', 10)->nullable();
            $table->string('estado', 20)->nullable();
            $table->string('observaciones', 255)->nullable();
                        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
