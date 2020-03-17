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
            $table->string('facebook_logo');
            $table->string('facebook');
            $table->string('twitter_logo');
            $table->string('twitter');
            $table->string('instagram_logo');
            $table->string('instagram');
            $table->string('youtube_logo');
            $table->string('youtube');
            
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
