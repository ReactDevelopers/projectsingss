<?php

use Illuminate\Database\Seeder;
use App\Models\Cpd;
use Illuminate\Http\UploadedFile;

class CpdTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 10; $i++) {

            $cpd = factory(Cpd::class)->create();

            $file['file'] = UploadedFile::fake()->image('avatar.png', 40, 40);

            $cpd->document()->addMedia($file, 'cpd');
        }
    }
}
