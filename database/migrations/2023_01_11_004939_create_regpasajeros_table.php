<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegpasajerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regpasajeros', function (Blueprint $table) {
            $table->id();
            $table->integer('num_interno');
            $table->integer('cant_pasajeros');
            $table->integer('cant_pasajeros_terminal')->nullable();
            $table->string('ruta')->nullable();
            $table->date('fecha_registro')->nullable();
            $table->dateTime('hora_registro')->nullable();
            $table->dateTime('fecha_recaudo')->nullable();
            $table->integer('valor_pasaje')->nullable();
            $table->integer('total_cuadre')->nullable();
            $table->integer('cod_recaudo')->nullable();
            $table->string('observaciones', 200)->nullable();
            $table->string('usr_crea')->nullable();
            $table->string('usr_recaudo')->nullable();
            $table->string('estado', 2)->nullable();
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
        Schema::dropIfExists('regpasajeros');
    }
}
