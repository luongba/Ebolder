<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnExamIdSaveExamResultSpeaking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('save_exam_result_speaking', function (Blueprint $table) {
            $table->integer('exam_id')->nullable();
            $table->integer('level_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('save_exam_result_speaking', function (Blueprint $table) {
            $table->dropColumn('exam_id');
            $table->integer('level_id')->change();
        });
    }
}
