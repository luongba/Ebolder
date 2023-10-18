<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeTableSpeaks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('speaks', function (Blueprint $table) {
            $table->longtext('description')->change();
            $table->string('audio_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('speaks', function (Blueprint $table) {
            $table->string('description')->change();
            $table->dropColumn('audio_url');
        });
    }
}
