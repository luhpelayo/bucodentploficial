<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_clinicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alergia',255);
            $table->string('radiografia',255);
            

            $table->integer('idarchivo')->unsigned();
            $table->foreign('idarchivo')->references('id')->on('archivos');

            $table->integer('consultaid')->unsigned();
            $table->foreign('consultaid')->references('id')->on('consultas');
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
        Schema::dropIfExists('ficha_clinicas');
    }
}
