<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MiaAppointment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mia_appointment', function (Blueprint $table) {
            $table->id();

            $table->integer('creator_id');
    $table->string('title');
    $table->string('subtitle');
    $table->text('caption');
    $table->integer('type');
    $table->integer('item_id');
    $table->integer('status');
    $table->dateTime('start');
    $table->dateTime('end');
    $table->text('data');
    

            $table->foreign('creator_id')->references('id')->on('mia_user');

            $table->timestamps();

            $table->integer('deleted')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mia_appointment');
    }
}