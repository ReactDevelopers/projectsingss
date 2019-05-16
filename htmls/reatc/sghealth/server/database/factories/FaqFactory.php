<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Faq::class, function (Faker $faker) {

    $user = \App\Models\User::inRandomOrder()->first();

    return [
        'subject'       => $faker->realText(),
        'question'      => $faker->realText(),
        'answer'        => $faker->realText(),
        'creator_id'    => $user ? $user->id : null
    ];
});
