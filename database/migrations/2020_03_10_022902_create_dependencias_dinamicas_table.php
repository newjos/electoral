<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependenciasDinamicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependencias_dinamicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('estado', 255);
            $table->string('municipio', 255);
            $table->string('parroquia', 255);
            $table->string('centro', 255);
            $table->string('mesa', 255);            
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
        Schema::dropIfExists('dependencias_dinamicas');
    }
}
