<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Photos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('phone_id');
            $table->string('Photo_name');
            $table->string('path');
            $table->string('url_photo');
            $table->string('url_video');
            $table->boolean('active');
            $table->integer('order');
            $table->decimal('previous_price');
            $table->integer('CreatedBy');
            $table->timestamps();
            $table->foreign('phone_id')->references('id')->on('Phones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Phones');
    }
}
