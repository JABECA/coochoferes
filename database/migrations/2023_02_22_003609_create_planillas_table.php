<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planillas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('numero_interno');
            $table->dateTime('fecha');
            $table->string('usr_crea');
            $table->string('kilometraje')->nullable();
            $table->string('conductor');
            $table->string('observaciones')->nullable();
            
            
            $table->string('usr_supervisa')->nullable();
            $table->dateTime('fecha_supervision')->nullable();
            $table->string('estado_planilla')->nullable();  //aprobada, no aprobada
            $table->string('estado_vehiculo')->nullable();  //aprobado, no aprobado 0 1 


            //llantas
            $table->string('presion');
            $table->string('labrado');
            $table->string('tuercas');
            $table->string('rines');
            $table->string('repuesto');

            //frenos
            $table->string('freno_parqueo');
            $table->string('sistema_frenos');
            $table->string('liquido_frenos');

            //Luces
            $table->string('luz_reversa');
            $table->string('luces_bajas');
            $table->string('luces_altas');
            $table->string('cucuyos');
            $table->string('luces_freno');
            $table->string('direccionales');

            //indicadores tablero
            $table->string('nivel_conbustible');
            $table->string('presion_aceite');
            $table->string('nivel_bateria');
            $table->string('nivel_temperatura');

            //condiciones de funcionamiento
            $table->string('retrovisores');
            $table->string('puertas');
            $table->string('nivel_aceite');
            $table->string('nivel_direccion');
            $table->string('nivel_refrigerante');
            $table->string('nivel_limpiabrisas');
            $table->string('pito');
            $table->string('limpiabrisas');
            $table->string('tapa_radiador');
            $table->string('correa_ventilador');
            $table->string('bateria');
            
            //nuevos campos solicitados
            $table->string('filtros_hys');
            $table->string('transmision');
            $table->string('ajuste_bornes');
            $table->string('fugas_motor');

            //equipo de carretera y seguridad
            $table->string('conos_triangulos_tacos');
            $table->string('herramientas');
            $table->string('linterna_gato');
            $table->string('cruceta_llave_pernos');
            $table->string('extintor');
            $table->string('salida_emergencia');
            $table->string('botiquin');
            $table->string('cinturones');
            $table->string('velocimetro');  // solo colectivo

            //aseo y presentacion
            $table->string('aseo_general');
            $table->string('conductor_uniformado');
            $table->string('conductor_carnet');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planillas');
    }
}
