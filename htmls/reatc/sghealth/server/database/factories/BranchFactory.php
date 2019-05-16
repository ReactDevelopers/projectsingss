<?php

use Faker\Generator as Faker;
use App\Models\Service;
use App\Models\Branch;

$factory->define(Branch::class, function (Faker $faker) {

    $services = Service::select('id')->inRandomOrder()->limit(20)->get()->pluck('id')->toArray();
    return [
        'name' => $faker->company,
        'branch_code' => str_random(10),
        'address' => $faker->address,
        'mon_fri_start_time' => '09:00:00',
        'mon_fri_end_time'   => '17:00:00',
        'sun_start_time' => '12:00:00',
        'sun_end_time' => '20:00:00',
        'sat_start_time' => '11:00:00',
        'sat_end_time' => '05:00:00',
        'ph_start_time' => '15:00:00',
        'ph_end_time' => '18:00:00',
        'service_ids' => $services,
    ];
});
