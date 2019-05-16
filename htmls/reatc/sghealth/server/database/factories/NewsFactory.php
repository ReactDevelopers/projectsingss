<?php

use Faker\Generator as Faker;
use App\Models\UserCertificate;
use App\Models\News;

$factory->define(App\Models\News::class, function (Faker $faker) {
	

    return [
        'title' => $faker->word,
        'description' => $faker->sentence(),
    ];
});
