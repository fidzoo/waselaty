<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('ar_position')->length(30);
            $table->string('en_position')->length(30);
            $table->string('ar_image');
            $table->string('en_image');
            $table->string('link');
            $table->integer('mcategory_id');
            $table->integer('category_id');
            $table->string('ar_category_title')->length(20);
            $table->string('en_category_title')->length(20);
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
        Schema::drop('banners');
    }
}
