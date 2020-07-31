<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('departure_place');
            $table->string('arrival_place');
            $table->datetime('departure_time');
            $table->datetime('arrival_time');
            $table->boolean('is_booking_open')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
