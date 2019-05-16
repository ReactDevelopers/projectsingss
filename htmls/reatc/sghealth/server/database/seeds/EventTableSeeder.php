<?php

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\EventImage;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        $user = \App\Models\User::inRandomOrder()->where('role_id',3)->first();

        for ($x = 0; $x <= 10; $x++) {

            $event = factory(Event::class)->create();
            for($y= 0; $y <= $faker->numberBetween(4, 10); $y++) {
            
                $eventMedia = factory(EventImage::class)->create(['event_id' => $event->id,'is_default'=> $y === 0 ? 'Yes' : 'No']);
                $file['file'] = UploadedFile::fake()->image('avatar.png', 40, 40);
                $eventMedia->image()->addMedia($file, 'event');
                
            }

            /***
             * insert institute for event
             */
            
            for($y= 0; $y <= $faker->numberBetween(1,5); $y++) {
                
                $institute = \App\Models\Institute::inRandomOrder()->first();
                $event->eventInstitutes()->firstOrCreate(['institute_id'=>$institute->id]);

                /***
                 * branch institute for event
                 */
                for($y= 0; $y <= $faker->numberBetween(1, 5); $y++) {
                    $branch = \App\Models\Branch::where('institute_id',$institute->id)->inRandomOrder()->first();
                    if($branch){

                        $event->eventBranches()->firstOrCreate(['branch_id'=>$branch->id]);
                    }
                }
            }


            /***
             * insert Profession Category 
             */
            for($y= 0; $y <= $faker->numberBetween(1, 5); $y++) {
                $profession = \App\Models\ProfessionCategory::inRandomOrder()->first();
                $event->eventProfessions()->firstOrCreate(['profession_cat_id'=>$profession->id]);
            }
        }
    }
}
