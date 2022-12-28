<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->integer('num_interno');
            $table->string('placa');
            $table->string('chasis');
            $table->string('carroceria');
            $table->string('modelo');
            $table->string('marca');
            
            $table->string('img_frontal')->nullable();
            $table->string('img_posterior')->nullable();
            $table->string('img_laterald')->nullable();
            $table->string('img_laterali')->nullable();
            
            $table->integer('cant_pasajeros');
            $table->string('motor');
            $table->string('tipo_combustible');
            $table->string('num_SOAT');
            $table->string('fec_venc_SOAT');
            $table->string('num_RTM');
            $table->string('fec_venc_RTM');
            $table->string('num_TOP');
            $table->string('ciudad_TOP');
            $table->string('fec_venc_TOP');
            $table->integer('id_propietario');
            $table->integer('id_conductor');
            $table->string('observaciones');
            $table->string('usr_crea');
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
        Schema::dropIfExists('vehiculos');
    }
}
