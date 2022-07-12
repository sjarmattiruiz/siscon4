<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacions', function (Blueprint $table) {
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
            $table->string('precio');
            $table->string('procedencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizacions');
    }
}
