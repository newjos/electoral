<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codest');
            $table->string('estado');
            $table->string('codmun');
            $table->string('municipio');
            $table->string('codparr');
            $table->string('parroquia');
            $table->string('codcen');
            $table->string('centro');
            $table->string('mesas');
            $table->string('electores');
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
        Schema::dropIfExists('centros');
    }
}
