<?php

use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use App\Models\News;


class NewsTableSeeder extends Seeder
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

            $news = factory(News::class)->create();
            $news->image()->addMedia($file, 'news');
        }
   
    }
}
