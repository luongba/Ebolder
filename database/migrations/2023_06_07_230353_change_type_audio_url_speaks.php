<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeAudioUrlSpeaks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('speaks', function (Blueprint $table) {
            $table->string("audio_url")->nullable()->change();
            $table->string("path_url")->nullable()->change();
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
            $table->string("audio_url")->change();
            $table->string("path_url")->change();
        });
    }
}
