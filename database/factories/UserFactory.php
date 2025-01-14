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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

//factory function for Model Category -start
$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'categoryname' => $faker->name,
        'created_at'=>date("Y-m-d H:i:s"),
        'updated_at'=>date("Y-m-d H:i:s"),
    ];
});
//factory function for Model Category -end

//factory function for Model Product -start
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'productname' => $faker->name,
        'productprice' =>$faker->randomFloat(),
        'productimage' => '',
        'category' => $faker->randomDigit,
    ];
});
//factory function for Model Product -end