<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('imageData1');
            $table->string('imageData2');
            $table->string('imageData3');
            $table->integer('rent');
            $table->string('terms');
            $table->string('city');
            $table->string('town');
            $table->string('referal');
            $table->timestamps();
            $table->foreign('email')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_rooms');
    }
}
