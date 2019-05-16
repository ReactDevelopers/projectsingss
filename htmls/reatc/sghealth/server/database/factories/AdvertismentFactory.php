<?php

use Faker\Generator as Faker;
use App\Models\UserCertificate;
use App\Models\Advertisment;

$factory->define(App\Models\Advertisment::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence(),
    ];
});
