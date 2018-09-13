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
            $table->string('import_name');
            $table->string('type');
            $table->string('src');
            $table->boolean('active');
            $table->integer('order')->nullable();
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
