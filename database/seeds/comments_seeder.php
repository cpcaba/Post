<?php

use Illuminate\Database\Seeder;

class comments_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Comment::class, 50)->create();
    }
}
