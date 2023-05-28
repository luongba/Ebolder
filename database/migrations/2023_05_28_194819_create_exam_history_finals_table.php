<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamHistoryFinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_history_finals', function (Blueprint $table) {
            $table->id();
            $table->string('result_reading')->nullable();
            $table->string('result_speaking')->nullable();
            $table->string('result_listening')->nullable();
            $table->string('result_vocabulary')->nullable();
            $table->string('result_grammar')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('exam_id')->nullable();
            $table->integer('time')->nullable()->default(0);
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
        Schema::dropIfExists('exam_history_finals');
    }
}
