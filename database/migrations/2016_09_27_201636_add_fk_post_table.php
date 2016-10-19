<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('posts', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')->deleted_at('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('posts', function (Blueprint $table) {
         $table->dropForeign('posts_user_id_foreign');
       });
    }
}
