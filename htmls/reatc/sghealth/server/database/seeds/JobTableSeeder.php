<?php

use Illuminate\Database\Seeder;
use App\Models\Assignment;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 10; $i++) {

            $assignment = factory(Assignment::class)->create();
            for($y=0; $y<5; $y++){
                $assignment->assignmentTimings()->create([
                    'date'=>date('Y-m-d'),
                    'start_time'=>time($format = 'h:i:s', $max = 'now') ,
                    'end_time'=>time($format = 'h:i:s', $max = 'now') 
                ]);
            }
        }
    }
}
