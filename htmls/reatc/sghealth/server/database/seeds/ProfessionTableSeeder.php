<?php

use Illuminate\Database\Seeder;
use App\Models\Profession;
use App\Models\ProfessionCategory;

class ProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professions = ['Ambulatory Nurse','Anesthesiologist','Audiologist','Behavioral Health Charge Nurse','Bereavement Counselor','Biologist','Cardiac Catheterization Lab Nurse','Cardiovascular Operating Room Nurse','Cardiovascular Technologist','Charge Nurse','Chiropractor','Counselor','Dentist','Dermatology Nurse','Dialysis Nurse','Doctor','Emergency Room Nurse','Endoscopy Nurse','Family Nurse Practitioner','Flight Nurse','Genetic Counselor','Home Health Nurse','Hospice Counselor','Hospice Nurse','House Supervisor Nurse','Intensive Care Nurse','Interventional Radiology Nurse','Labor and Delivery Nurse','Lead Registered Nurse','Legal Nurse Consultant','Licensed Practical Nurse','Licensed Vocational Nurse','Medical Surgery Nurse','Microbiologist','Neonatal Intensive Care Nurse','Nurse','Nurse Anesthetist','Nurse Midwife','Nurse Practitioner','Nursing Assistant','Occupational Health Nurse','Occupational Health and Safety Specialist','Occupational Therapist','Office Nurse','Oncology Nurse','Operating Room Nurse','Optician','Optometrist','Orthotist','Outreach RN','Paramedic','Pediatric Endocrinology Nurse','Pediatric Intensive Care Nurse','Pediatric Nurse','Pediatric Nurse Practitioner','Perioperative Nurse','Pharmacist','Prosthetist','Physician','Podiatrist','Post Anesthesia Nurse','Postpartum Nurse','Progressive Care Nurse','Psychiatric Nurse','Psychiatric Nurse Practitioner','Public Health Nurse','Registered Nurse (RN)','Registered Nurse (RN) Case Manager','Registered Nurse(RN)Data Coordinator','Registered Nurse (RN)First Assistant','Registered Nurse (RN) Geriatric Care','Registered Nurse (RN) Medical Inpatient Services','Registered Nurse (RN) Patient Call Center','Registered Nurse (RN) Student Health Services','Registered Nurse (RN) Telephone Triage','Registered Nurse (RN) Urgent Care','Registered Nurse (RN) Women\'s Services','Restorative Nurse','Registered Medical Assistant','Respiration (Inhalation) Therapist','School Nurse','Speech-Language Pathologist','Surgeon','Telemetry Nurse','Therapist','Veterinarian','Veterinary Assistant','Veterinary Technologist','Wellness Nurse'];

        foreach($professions as $profession) {

            $category = ProfessionCategory::inRandomOrder()->first();

            Profession::firstOrCreate(['name'=> $profession], ['description' => $profession, 'profession_category_id' => $category ? $category->id : null,'options'=> ['isMultipleInstitute'=>'false','can_work_at'=> 'true']]);
        }
    }
}
