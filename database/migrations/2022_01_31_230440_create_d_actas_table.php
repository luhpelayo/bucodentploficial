<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDActasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_actas', function (Blueprint $table) {
            $table->id();
            $table->integer('acta_code');
            $table->time('acta_hour');
            $table->date('acta_date');
            $table->string('acta_court');
            $table->integer('acta_note');
            $table->string('acta_image');
            $table->foreignId('modality_id')->constrained('modalities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('students')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('d_actas');
    }
}
