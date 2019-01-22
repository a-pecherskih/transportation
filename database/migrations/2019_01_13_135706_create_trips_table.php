<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coefficient');
            $table->integer('price_kg');
            $table->integer('lasting');
            $table->integer('overpricing');
            $table->timestamps();

            $table->integer('departure_id')->unsigned();
            $table->foreign('departure_id')->references('id')->on('points');

            $table->integer('arrival_id')->unsigned();
            $table->foreign('arrival_id')->references('id')->on('points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
