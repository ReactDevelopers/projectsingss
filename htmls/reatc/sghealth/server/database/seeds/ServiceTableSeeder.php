<?php

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $services = ['General Hospitals', 'Internal Medicine', 'Gastroenterology', 'Surgery', 'Orthopedic Surgery', 'Rheumatology', 'Rehabilitation', 'Cardiology', 'Dermatology (Skin)', 'Urology', 'Otorhinolaryngology (Ear, Nose, Throat)', 'Ophthalmology (Eye)', 'Respiratory Medicine', 'Pediatrics', 'Traditional Chinese Internal Medicine', 'Obstetrics and Gynecology', 'Dentistry', 'Oral Surgery', 'Pedodontics', 'Orthodontics', 'Allergic Medicine', 'General Hospitals\' list of medical care in maltiple languages', 'Clinics\' list of medical care in maltiple languages'];

        foreach($services as $service) {

            Service::firstOrCreate(['short_name' => $this->createShortCode($service)],[
                'name' => $service
            ]);
        }
    }

    private function createShortCode($str) {

        $words = preg_split("/[\s\(\),_-]+/", $str);

        $acronym = "";

        foreach ($words as $w) {
            if($w)
            $acronym .= $w[0];
        }
        return strtoupper($acronym);
    }
}
