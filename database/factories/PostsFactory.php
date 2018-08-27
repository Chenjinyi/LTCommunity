<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\PostsModel::class, function (Faker $faker) {
    return [
        'title' => $faker->text(40),
        'subtitle' => $faker->text(50),
        'content' => $faker->text(1000), // secret
        'user_id' => mt_rand(1,100),
    ];
});
$factory->define(App\TagsModel::class, function (Faker $faker) {
    return [
        'title' => $faker->text(40),
        'user_id' => mt_rand(1,100),
        'subtitle' => $faker->text(50),
        'content' => $faker->text(1000), // secret
        'posts_id' => mt_rand(300,1000),
    ];
});