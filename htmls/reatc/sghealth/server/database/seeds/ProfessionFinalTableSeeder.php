<?php

use Illuminate\Database\Seeder;
use App\Models\ProfessionCategory;


class ProfessionFinalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profession_categories = ['Doctors','Pharmacists','Allied Health','Nurses','Admin','Support','Others','Management'];
        foreach($profession_categories as $key => $profession_category) {

            $response = ProfessionCategory::firstOrCreate(
                   ['name' => $profession_category ],
                   ['category_image_id' => null ]);  
	
		}									
    }
}
