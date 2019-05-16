<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Cpd::class, function (Faker $faker) {

	$user = \App\Models\User::inRandomOrder()->first();

    return [
        'user_id' => $user ? $user->id : null,
        'code' => $faker->numberBetween(1000, 9000),
        'cpd_credit' => $faker->numberBetween(1,10),
        'title' => $faker->realText(),
        'description' => $faker->realText(),
        'role' => $faker->realText(),
        'date' => $faker->date('Y-m-d')
    ];
});
