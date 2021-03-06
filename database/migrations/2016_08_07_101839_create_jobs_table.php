<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('country_id');
            $table->integer('add_rank')->length(3); //0: normal, 1: premium
            $table->boolean('approved'); //0: not approved yet, 1: approved 2:rejected
            $table->boolean('payment'); //1: using cash, 2: using paypal
            $table->integer('add_type'); //1: belongs to company, 2:belongs to person
            $table->integer('price_id');
            $table->string('ar_title');
            $table->string('en_title');
            $table->text('ar_descrip');
            $table->text('en_descrip');
            $table->integer('gender');//0:Male, 1:female, 2:both
            $table->integer('salary')->nullable();
            $table->string('currency')->length(20);
            $table->integer('experience')->nullable();
            $table->string('phone')->length(50);
            $table->string('email')->length(50);
            $table->string('image');
            $table->string('duration')->length(10);
            $table->datetime('expire_date');
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
        Schema::drop('jobs');
    }
}
