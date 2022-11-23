<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsVocabularysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_vocabulary_relationship', function (Blueprint $table) {
            $table->bigInteger('vocabulary_id');
            $table->bigInteger('question_vocabulary_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_vocabulary_relationship', function (Blueprint $table) {
            //
        });
    }
}
