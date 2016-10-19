<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDeletedatTablePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('posts', function (Blueprint $table) {
          $table->renameColumn('deleted_at','removed_at');
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
          $table->renameColumn('removed_at','deleted_at');
      });
    }
}
