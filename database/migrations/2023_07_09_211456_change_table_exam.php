<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTableExam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->integer('reading_id')->nullable()->change();
            $table->integer('vocabulary_id')->nullable()->change();
            $table->integer('grammar_id')->nullable()->change();
            $table->integer('speaking_id')->nullable()->change();
            $table->integer('listening_id')->nullable()->change();
            $table->integer('pronunciation_id')->nullable()->change();
            $table->integer('writing_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->integer('reading_id')->nullable(false)->change();
            $table->integer('vocabulary_id')->nullable(false)->change();
            $table->integer('grammar_id')->nullable(false)->change();
            $table->integer('speaking_id')->nullable(false)->change();
            $table->integer('listening_id')->nullable(false)->change();
            $table->integer('pronunciation_id')->nullable(false)->change();
            $table->integer('writing_id')->nullable(false)->change();
        });
    }
}
