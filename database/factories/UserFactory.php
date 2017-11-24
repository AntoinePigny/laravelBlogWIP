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
    static $password;

    return [
        'firstname' => $faker->firstName(),
        'lastname' => $faker->lastName,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'status' => $faker->numberBetween(1, 4),
        'remember_token' => str_random(10),
        'created_at' => $faker->dateTimeBetween('2014-04-23', '2016-05-11'),
        'updated_at' => $faker->dateTimeBetween('2016-05-11', '2017-05-11'),
    ];
});
