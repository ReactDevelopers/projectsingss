<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Certificate::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->sentence(),
    ];
});
