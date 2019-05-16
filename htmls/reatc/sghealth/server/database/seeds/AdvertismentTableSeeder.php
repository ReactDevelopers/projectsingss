<?php

use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use App\Models\Advertisment;

class AdvertismentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = [];
        $file['file'] = UploadedFile::fake()->image('avatar.jpg', 600, 600);
        
        for ($x = 0; $x <= 10; $x++) {

            $advertisment = factory(Advertisment::class)->create();
            $advertisment->image()->addMedia($file, 'advertisment');
        } 
    }
}

