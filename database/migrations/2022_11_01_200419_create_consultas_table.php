<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fechahora');

            $table->integer('pacienteid')->unsigned();
            $table->foreign('pacienteid')->references('id')->on('pacientes');

            $table->integer('odontologoid')->unsigned();
            $table->foreign('odontologoid')->references('id')->on('odontologos');

            $table->integer('odontogramaid')->unsigned();
            $table->foreign('odontogramaid')->references('id')->on('odontogramas');

            $table->integer('serviciosid')->unsigned();
            $table->foreign('serviciosid')->references('id')->on('servicios');
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
        Schema::dropIfExists('consultas');
    }
}
