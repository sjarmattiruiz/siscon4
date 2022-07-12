<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolEntrantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sol_entrantes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('apeynombre');
            $table->date('fecha_cirugia');
            $table->string('necesidad');
            $table->string('clinica');
            $table->string('medico');
            $table->string('observacion');
            $table->string('aposid');
            $table->string('articulos');
            $table->string('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sol_entrantes');
    }
}
