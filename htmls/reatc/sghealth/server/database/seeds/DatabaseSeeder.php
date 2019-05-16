<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(CertificateTableSeeder::class);
        $this->call(ProfessionCategorySeeder::class);
        $this->call(ProfessionTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(InstituteCategoryTableSeeder::class);
        $this->call(InstituteTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SiteConfigTableSeeder::class);
        $this->call(NotificationTemplateTableSeeder::class);
        $this->call(BannerCategoryTableSeeder::class);
        $this->call(BannerTableSeeder::class);
    }
}
