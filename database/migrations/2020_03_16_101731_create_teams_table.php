<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('designation');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('description');
            $table->string('image')->default('team.jpg');
            $table->string('facebook_logo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter_logo')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram_logo')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube_logo')->nullable();
            $table->string('youtube')->nullable();
            $table->integer('status')->default(1);
            
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
        Schema::dropIfExists('teams');
    }
}
