<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles_tags', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')
                ->references('id')->on('profiles');
                
            $table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')
                ->references('id')->on('tags');
            
            $table->integer('rating');
            
            $table->boolean('is_seeking');
            $table->boolean('is_offering');
            
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
        Schema::drop('profiles_tags');
    }
}
