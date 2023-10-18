<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnResultTalkingToResultPronunciationHistoryTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exam_history_finals', function (Blueprint $table) {
             $table->renameColumn('result_talking', 'result_pronunciation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exam_history_finals', function (Blueprint $table) {
            $table->renameColumn('result_pronunciation', 'result_talking');
        });
    }
}
