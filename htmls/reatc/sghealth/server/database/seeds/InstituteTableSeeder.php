<?php

use Illuminate\Database\Seeder;
use App\Models\Institute;
use App\Models\Branch;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

class InstituteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($x = 0; $x <= 10; $x++) {

            $institute = factory(Institute::class)->create();

            $file['file'] = UploadedFile::fake()->image('avatar.png', 40, 40);

            $institute->logo()->addMedia($file, 'institute');

            for($y= 0; $y <= $faker->numberBetween(4, 20); $y++) {

                factory(Branch::class)->create(['institute_id' => $institute->id]);
            }

        }
    }
}
