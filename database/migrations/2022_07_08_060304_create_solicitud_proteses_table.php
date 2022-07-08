<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudProtesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_proteses', function (Blueprint $table) {
            $table->id();
            $table->string('solicitud_id');
            $table->string('nroAfiliado');
            $table->string('necesidad');
            $table->string('estado_paciente');
            $table->string('instituto_internacion');
            $table->string('ortopedia_id');
            $table->string('medico_id');
            $table->string('fecha_solicitud');
            $table->string('articulo');
            $table->string('observacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_proteses');
    }
}
