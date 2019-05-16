<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Assignment::class, function (Faker $faker) {
    
    $user = \App\Models\User::inRandomOrder()->first();
    $institute = \App\Models\Institute::inRandomOrder()->first();
    $branch = \App\Models\Branch::inRandomOrder()->where(['institute_id'=>$institute->id])->first();

    return [
        'institute_id'      => $institute ? $institute->id : null,
        'branch_id'         => $branch ? $branch->id : null,
        'title'             => $faker->catchPhrase,
        'description'       => $faker->text,
        'status'            => 'active',
        'cost'              => $faker->numberBetween(100,1000),
        'created_by'        => $user->id,
    ];
});
