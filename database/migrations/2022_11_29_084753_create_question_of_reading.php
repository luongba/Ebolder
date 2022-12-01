<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionOfReading extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_reading', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('reading_id');
            $table->string('question');
            $table->integer('level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function dropIfExists()
    {
        Schema::dropIfExists('questions_reading');
    }
}
