<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecibosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recibos', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('ajc',11, 2);
            $table->decimal('credito',11, 2);
            $table->string('diente',255);
            $table->date('fecha');
            $table->decimal('saldo',11, 2);
            $table->date('tiempo');
            $table->string('tratamiento',255);

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
        Schema::dropIfExists('recibos');
    }
}
