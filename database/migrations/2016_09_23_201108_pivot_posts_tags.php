<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivotPostsTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('posts_tags', function (Blueprint $table) {
        $table->increments('id');
        $table->timestamps();
        $table->integer('post_id')->unsigned();
        $table->integer('tag_id')->unsigned();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_tags');
    }
}
