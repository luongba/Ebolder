<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaveExamResultSpeaking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('save_exam_result_speaking', function (Blueprint $table) {
            $table->id();
            $table->integer('level_id');
            $table->integer('user_id');
            $table->integer('test_id');
            $table->string('url_audio');
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
        Schema::dropIfExists('save_exam_result_speaking');
    }
}
