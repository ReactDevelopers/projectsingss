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
        'email' => $faker->email,
        'pubnet_id' => $faker->unique()->numberBetween(21147,50000000),
        'role_id' => $faker->randomElement([1,2]),
        'recipient' => $faker->randomElement([1,2])
    ];
});


