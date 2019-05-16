<?php

use Illuminate\Database\Seeder;
use App\Models\Banner;
use App\Models\BannerCategory;
use Illuminate\Http\UploadedFile;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner_category = BannerCategory::where('name', 'splash_screen')->first();

        for ($x = 0; $x <= 3; $x++) {

            $file = [];
            $file['file'] = UploadedFile::fake()->image('splash_screen.png', 	2048, 2732);
            $file['thumbnails'] = [
                [
                    'file' => UploadedFile::fake()->image('splash_screen_iphone_x_max.png', 	1242, 2688)
                ]
            ];


            $banner = Banner::create([
                'banner_category_id' => $banner_category ? $banner_category->id : null
            ]);

            $banner->image()->addMedia($file, 'banners');
        }
    }
}
