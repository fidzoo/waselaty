<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_item')->length('30');
            $table->string('en_title')->length('30');
            $table->string('en_item')->length('30');
            $table->float('normal_price');
            $table->string('norm_currency')->length('30')
            $table->float('premium_price');
            $table->string('prem_currency')->length('30');
            $table->float('paypal_norm_price');
            $table->string('paypal_norm_currency')->length('10');
            $table->float('paypal_prem_price');
            $table->string('paypal_prem_currency')->length('10');
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
        Schema::drop('prices');
    }
}
