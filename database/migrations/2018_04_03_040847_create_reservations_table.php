<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id');
            $table->integer('sob_id');
            $table->string('guest_name');
            $table->string('country');
            $table->string('email');
            $table->enum('status',['confirmed','holding','registered','canceled']);
            $table->date('check_in');
            $table->date('check_out'); 
            $table->tinyInteger('los');
            $table->integer('rate_usd');
            $table->integer('rate_idr');
            $table->integer('rate_contract');
            $table->text('remark');
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
        Schema::dropIfExists('reservations');
    }
}
