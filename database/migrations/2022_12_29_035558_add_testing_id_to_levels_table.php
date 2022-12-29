<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTestingIdToLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('levels', function (Blueprint $table) {
            $table->string('reading_id')->nullable();
            $table->string('listening_id')->nullable();
            $table->string('vocabulary_id')->nullable();
            $table->string('grammar_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('levels', function (Blueprint $table) {
            $table->dropColumn('reading_id');
            $table->dropColumn('listening_id');
            $table->dropColumn('vocabulary_id');
            $table->dropColumn('grammar_id');
        });
    }
}
