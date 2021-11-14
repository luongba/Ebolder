<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_title');
            $table->string('coupon_type');
            $table->string('coupon_code');
            $table->string('discount_type');
            $table->string('calculated_on');
            $table->string('discount_value');
            $table->string('require_value')->default(NULL);
            $table->string('applie_to');
            $table->string('collection');
            $table->string('data_start');
            $table->string('time_start');
            $table->string('date_end')->default(NULL);
            $table->string('time_end')->default(NULL);
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
        Schema::dropIfExists('coupons');
    }
}
