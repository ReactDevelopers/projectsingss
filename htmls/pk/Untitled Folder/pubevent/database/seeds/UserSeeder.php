<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
            'pubnet_id' 		=> "99999",
            'email' 	=> "sanjeet@singsys.com",
            'role_id' 		=> 1
        ]]);	
    }
}
