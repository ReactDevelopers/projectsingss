<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
        	['name'=>'super_admin', 'title'=>'Super Admin', 'description'=>'Super Admin'],
        	['name'=>'admin', 'title'=>'Admin', 'description'=>'Admin'],
        ]);
    }
}
