<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('program_code');
            $table->string('program_name');
            $table->string('program_acronym');
            $table->string('program_level');
            $table->string('program_credit');
            $table->date('program_date');
            $table->string('program_designed');
            $table->string('program_document')->nullable();
            $table->foreignId('area_id')->constrained('areas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('programs');
    }
}
