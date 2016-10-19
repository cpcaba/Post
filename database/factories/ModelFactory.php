<?php


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name_tag' => $faker->word,
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'desc' => $faker->text($maxNbChars=100),
        'text' => $faker->text,
        'user_id' =>  $faker->numberBetween($min=1, $max=50),
        'category_id' => $faker->numberBetween($min=1, $max=10),
    ];
});
$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->text($maxNbChars=100),
        'user_id' =>  $faker->numberBetween($min=1, $max=50),
        'post_id' =>  $faker->numberBetween($min=1, $max=10),
    ];
});
