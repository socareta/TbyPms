<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('property_name');
            $table->string('property_address');
            $table->string('property_phone');
            $table->string('reservation_email');
            $table->string('sales_person');
            $table->string('sales_contact');
            $table->string('sales_email');
            $table->string('website');
            $table->enum('bank_name',['BCA','BNI','MANDIRI','BRI']);
            $table->string('bank_account');
            $table->string('account_name');
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
        Schema::dropIfExists('properties');
    }
}
