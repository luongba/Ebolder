<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_result', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('level_id');
            $table->boolean('is_done_listen')->default(false);
            $table->boolean('is_done_read')->default(false);
            $table->boolean('is_done_vocabulary')->default(false);
            $table->boolean('is_done_grammar')->default(false);
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
        Schema::dropIfExists('exam_result');
    }
}
