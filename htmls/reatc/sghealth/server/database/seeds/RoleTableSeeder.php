<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
//use DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //DB::table('roles')->delete();
        //DB::table('roles')->truncate();
        Role::firstOrCreate(['name' => 'super_admin'],
        [
            'title' => 'Super Admin',
            'choosable' => 'Y',
            'landing_page'=>'admin/dashboard'
        ]);

        Role::firstOrCreate(['name' => 'manager'],
        [
            'title' => 'Manger',
            'choosable' => 'Y',
            'landing_page'=>'admin/dashboard'
        ]);

        Role::firstOrCreate(['name' => 'employee'],
        [
            'title' => 'Employee',
            'choosable' => 'Y'
        ]);

        Role::firstOrCreate(['name' => 'freelancer'],
        [
            'title' => 'Freelancer',
            'choosable' => 'Y'
        ]);

        Role::firstOrCreate(['name' => 'event-manager'],
        [
            'title' => 'Event Manager',
            'choosable' => 'Y',
            'landing_page' => 'admin/dashboard'
        ]);
    }
}
