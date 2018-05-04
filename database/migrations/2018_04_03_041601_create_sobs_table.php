<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sob_name');
            $table->string('sob_website');
            $table->string('sob_contact_person');
            $table->string('sob_phone');
            $table->string('sob_email');
            $table->string('cs_email');
            $table->string('cs_phone');
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
        Schema::dropIfExists('sobs');
    }
}
