<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsidentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insidentes', function (Blueprint $table) {
            $table->id();
            $table->integer('num_interno');
            $table->string('placa', 10);
            $table->string('tipo');
            $table->string('descripcion');
            $table->date('fecha');
            $table->string('duracion')->nullable();
            $table->string('solucion')->nullable();
            $table->string('estado', 2);
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
        Schema::dropIfExists('insidentes');
    }
}
