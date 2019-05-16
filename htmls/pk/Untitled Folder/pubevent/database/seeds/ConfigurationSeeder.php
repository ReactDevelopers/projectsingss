<?php

use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuration')->insert([[
            'key' 		=> "email_threshold_tenure",
            'value' 	=> "15",
        ]]);	
    }
}
