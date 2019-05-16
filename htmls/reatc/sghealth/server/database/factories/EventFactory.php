<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Event::class, function (Faker $faker) {

    $user = \App\Models\User::inRandomOrder()->first();

    return [
        'manager_id'        => $user ? $user->id : null,
        'manager_email'     => null,
        'title'             => $faker->catchPhrase,
        'description'       => $faker->text,
        'is_lucky_draw'     => 'No',
        'event_date'        => date($format = 'Y-m-d'),
        'event_start_time'  => $faker->dateTimeBetween($startDate = 'now', $endDate = '+24 hours'),
        'event_end_time'    => $faker->dateTimeBetween($startDate = 'now', $endDate = '+24 hours'),
        'created_by'        =>  $user ? $user->id : null,
        'payment_link'      => 'https://google.com',
    ];
});
