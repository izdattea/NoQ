<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->string('description')->nullable();
            $table->integer('current_queue')->nullable(); //current queue
            $table->integer('i2')->nullable(); //initial table for pax2
            $table->integer('i4')->nullable(); //initial table for pax4
            $table->integer('i8')->nullable(); //initial table for pax8
            $table->integer('pax2')->nullable(); //to change for pax2
            $table->integer('pax4')->nullable(); //to changefor pax2
            $table->integer('pax8')->nullable(); //to change for pax2
            $table->integer('time2')->nullable();
            $table->integer('time4')->nullable();
            $table->integer('time8')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('restaurant');
    }
}
