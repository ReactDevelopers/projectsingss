<?php

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 10; $x++) {

            factory(Faq::class)->create();
        }
    }
}
