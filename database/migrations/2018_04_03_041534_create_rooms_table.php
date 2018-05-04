<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->string('room_name');
            $table->mediumText('room_description');
            $table->integer('room_size');
            $table->tinyInteger('number_bed');
            $table->integer('max_adult');
            $table->tinyInteger('max_extra_person');
            $table->integer('extrabed_charge');
            $table->text('bed_config');
            $table->string('typeOfRoom');
            $table->integer('rateLowSeason');
            $table->integer('rateHightSeason');
            $table->integer('ratePeakSeason');
            $table->text('rate_remark');
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
        Schema::dropIfExists('rooms');
    }
}
