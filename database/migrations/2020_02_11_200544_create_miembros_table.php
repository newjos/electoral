<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cedula', 11);
            $table->string('nombre');
            $table->string('cargo');
            $table->string('estado');
            $table->string('municipio');
            $table->string('parroquia');
            $table->string('telefono', 15);
            $table->string('correo');
            $table->string('banco');
            $table->string('cuenta');
            $table->string('titularCta');
            $table->string('cedulaCta');
            $table->string('centro');
            $table->string('mesa');
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
        Schema::dropIfExists('miembros');
    }
}
