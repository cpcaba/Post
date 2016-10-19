<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(users_seeder::class);
        $this->call(categories_seeder::class);
        $this->call(tags_seeder::class);
        $this->call(posts_seeder::class);
        $this->call(comments_seeder::class);
    }
}
