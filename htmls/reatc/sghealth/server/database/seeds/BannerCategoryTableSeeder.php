<?php

use Illuminate\Database\Seeder;
use App\Models\BannerCategory;

class BannerCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        BannerCategory::updateOrCreate(['name' => 'splash_screen'], [
            'name' => 'splash_screen',
            'title' => 'Splash screen'
        ]);
    }
}
