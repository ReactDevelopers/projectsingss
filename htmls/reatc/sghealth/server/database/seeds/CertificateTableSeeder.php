<?php

use Illuminate\Database\Seeder;
use App\Models\Certificate;

class CertificateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 100; $x++) {
            factory(Certificate::class)->create();
        }
    }
}
