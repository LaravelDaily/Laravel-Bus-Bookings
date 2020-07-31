<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRidesTable extends Migration
{
    public function up()
    {
        Schema::table('rides', function (Blueprint $table) {
            $table->unsignedInteger('bus_id');
            $table->foreign('bus_id', 'bus_fk_1918899')->references('id')->on('buses');
        });
    }
}
