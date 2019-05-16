<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	foreach (range(1, 50) as $key => $value) {
    		
    		factory(\App\User::class)->create();
    	}

    	factory(\App\User::class)->create(['pubnet_id'=>21146]);
        
    }
}
