<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddfkTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('posts', function (Blueprint $table) {
        $table->foreign('category_id')->references('id')->on('categories')->deleted_at('cascade');
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
        $table->dropForeign('posts_category_id_foreign');
      });
    }
}
