<?php

use Illuminate\Database\Seeder;
use App\Models\License;

class LicenseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        License::create([
            'name' => 'MOH License No.'
        ]);

        License::create([
            'name' => 'L5 License Holder'
        ]);

        License::create([
            'name' => 'Type of Maintenance Contract'
        ]);
    }
}
