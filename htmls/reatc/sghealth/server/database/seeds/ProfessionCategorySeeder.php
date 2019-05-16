<?php

use Illuminate\Database\Seeder;
use App\Models\ProfessionCategory;
use Illuminate\Http\UploadedFile;

class ProfessionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for ($x = 0; $x <= 10; $x++) {

            $file = [];
            $file['file'] = UploadedFile::fake()->image('avatar.png', 40, 40);
            $data = factory(ProfessionCategory::class)->make()->toArray();
            $category = ProfessionCategory::updateOrCreate(['name'=> $data['name']], $data);
            $category->icon()->addMedia($file, 'profession_category');
        }
    }
}
