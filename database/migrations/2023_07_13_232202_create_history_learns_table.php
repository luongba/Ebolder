<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryLearnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_learns', function (Blueprint $table) {
            $table->id();
            $table->string('topic_name');
            $table->string('scores');
            $table->string('completion_time');
            $table->integer('user_id');
            $table->string('level_id');
            $table->string('test_type');
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
        Schema::dropIfExists('history_learns');
    }
}
