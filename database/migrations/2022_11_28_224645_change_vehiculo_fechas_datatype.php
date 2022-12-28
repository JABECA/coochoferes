<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ChangeVehiculoFechasDatatype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehiculos', function (Blueprint $table) {
            //
            DB::statement("ALTER TABLE vehiculos MODIFY fec_venc_SOAT DATE");
            DB::statement("ALTER TABLE vehiculos MODIFY fec_venc_RTM  DATE");
            DB::statement("ALTER TABLE vehiculos MODIFY fec_venc_TOP  DATE");
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehiculos', function (Blueprint $table) {
            //
        });
    }
}
