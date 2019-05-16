<?php

use Illuminate\Database\Seeder;
use App\Models\InstituteCategory;
use Illuminate\Http\UploadedFile;

class InstituteCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($x = 0; $x <= 10; $x++) {

            $file = [];
            $file['file'] = UploadedFile::fake()->image('avatar.png', 40, 40);
            $data = factory(InstituteCategory::class)->make()->toArray();

            $category = InstituteCategory::updateOrCreate(['name'=> $data['name']], $data);
            $category->icon()->addMedia($file, 'institute_category');
        }
    }
}
