<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('profilePicture');
            $table->string('tagOne');
            $table->string('tagTwo');
            $table->string('tagThree');
            $table->string('telephoneNo');
            $table->date('dateOfBirth');
            $table->string('gender');
            $table->string('sexualOrientation');
            $table->string('city');
            $table->string('town');
            $table->string('socialOne');
            $table->string('socialTwo');
            $table->string('referal');
            $table->integer('noOfReveals')->default(0);
            $table->string('brandAmbassador');
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
        Schema::dropIfExists('profiles');
    }
}
