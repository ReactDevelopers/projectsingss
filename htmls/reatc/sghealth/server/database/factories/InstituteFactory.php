<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Institute::class, function (Faker $faker) {

    $category = \App\Models\InstituteCategory::inRandomOrder()->first();

    return [
        'name' => $faker->company,
        'registration_no' => $faker->uuid,
        'institute_category_id' => $category ? $category->id : null
    ];
});
