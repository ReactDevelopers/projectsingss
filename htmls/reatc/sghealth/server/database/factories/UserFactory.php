<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Institute;
use App\Models\Profession;
use App\Models\Service;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {

    $email_verified_at = $faker->randomElement([now(), null]);
    $mobile_verified_at = $faker->randomElement([now(), null]);
    $institute = Institute::inRandomOrder()->with('branches')->first();
    $branch_id = $faker->randomElement($institute->branches->pluck('id')->toArray());

    $services = Service::select('id')->inRandomOrder()->limit(15)->get()->pluck('id')->toArray();
    $mobile_no = $faker->e164PhoneNumber;
    $mobile_no  = '+91-' . substr($mobile_no, 3);
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => $email_verified_at,
        'mobile_verified_at' => $email_verified_at,
        'password' => Hash::make(123456),
        'mobile_no' => $mobile_no,
        'role_id' => Role::inRandomOrder()->first()->id,
        'institute_ids' => [$institute->id],
        'branch_id' => $branch_id,
        'profession_id' => Profession::inRandomOrder()->first()->id,
        'service_ids' => $services,
        'remember_token' => str_random(10),
        'options' => ['isMultipleInstitute'=>'no','total_institute' => 10]
    ];
});
