<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::Create('Specifications',function(Blueprint $table){
           $table->increments('id');
           $table->unsignedInteger('phone_id');
           $table->boolean('hasNetwork')->default('0');
           $table->string('technology')->nullable();
           $table->string('twoG')->nullable();
           $table->string('threeG')->nullable();
           $table->string('fourG')->nullable();
           $table->string('speed')->nullable();
           $table->boolean('GPRS')->default('0');
           $table->boolean('EDGE')->default('0');
           $table->boolean('hasLaunch')->default('0');
           $table->date('announcedDate')->nullable();
           $table->boolean('status')->default('0');
           $table->date('releaseDate')->nullable();
           $table->boolean('hasBody')->default('0');
           $table->string('dimensions')->nullable();
           $table->string('weight')->nullable();
           $table->string('SIM')->nullable();
           $table->boolean('display')->default('0');
           $table->string('type')->nullable();
           $table->string('size')->nullable();
           $table->string('resolution')->nullable();
           $table->string('multitouch')->nullable();
           $table->string('protection')->nullable();
           $table->boolean('hasPlatform')->default('0');
           $table->string('OS')->nullable();
           $table->string('chipset')->nullable();
           $table->string('CPU')->nullable();
           $table->string('GPU')->nullable();
           $table->boolean('hasMemory')->default('0');
           $table->string('cardSlot')->nullable();
           $table->string('internal')->nullable();
           $table->boolean('hasCamera')->default('0');
           $table->string('primary')->nullable();
           $table->string('features')->nullable();
           $table->string('video')->nullable();
           $table->string('secondary')->nullable();
           $table->boolean('hasSound')->default('0');
           $table->string('alertTypes')->nullable();
           $table->string('loudSpeaker')->nullable();
           $table->boolean('audioJack')->default('0');
           $table->boolean('hasCommunications')->default('0');
           $table->string('WLAN')->nullable();
           $table->string('bluetooth')->nullable();
           $table->string('GPS')->nullable();
           $table->boolean('NFC')->default('0');
           $table->boolean('Radio')->default('0');
           $table->string('USB')->nullable();
           $table->boolean('hasFeatures')->default('0');
           $table->string('sensors')->nullable();
           $table->string('messaging')->nullable();
           $table->string('browser')->nullable();
           $table->string('java')->nullable();
           $table->string('batteryDetail')->nullable();
           $table->string('colors')->nullable();
           $table->string('testDetail')->nullable();
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
        Schema::dropIfExists('Specifications');
        
    }
}
