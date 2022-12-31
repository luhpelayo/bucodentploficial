<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdontogramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odontogramas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('diagnostico',255);
            $table->date('fechainicio');
            $table->date('fechafin');

            $table->integer('tratamientoid')->unsigned();
            $table->foreign('tratamientoid')->references('id')->on('tratamientos');

            $table->integer('dienteid')->unsigned();
            $table->foreign('dienteid')->references('id')->on('dientes');

            $table->integer('parteid')->unsigned();
            $table->foreign('parteid')->references('id')->on('partes');
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
        Schema::dropIfExists('odontogramas');
    }
}
