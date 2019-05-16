<?php

use Faker\Generator as Faker;
use App\Models\UserCertificate;
use App\Models\Certificate;
//use
$factory->define(UserCertificate::class, function (Faker $faker) {

    $certificate = Certificate::inRandomOrder()->first();

    return [
        'certificate_id' => $certificate->id,
        'expiry_date' => $faker->date,
        'certified_on' => $faker->date,
        'cert_info' => $faker->text,
    ];
});
