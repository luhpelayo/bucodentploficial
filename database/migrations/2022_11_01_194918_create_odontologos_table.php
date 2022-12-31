<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdontologosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odontologos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 255);
            $table->string('apellido', 255);
            $table->string('ci', 255);
            $table->date('fechanacimiento');
            $table->string('direccion');
            $table->integer('telefono');
            $table->string('email',255);
            $table->string('especialidad',255);
            $table->integer('ruc');
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
        Schema::dropIfExists('odontologos');
    }
}
