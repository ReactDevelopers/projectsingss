<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use App\Models\Certificate;
use App\Models\UserCertificate;

class UserTableSeeder extends Seeder
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
        // $file = [];
        // $file['file'] = UploadedFile::fake()->create('docs.pdf');

        for ($x = 0; $x <= 10; $x++) {

            $user = factory(User::class)->create();
            $user->profileImage()->addMedia($file, 'profile');

            for ($y = 0; $y <= 4; $y++) {


                $user_certificate_arr = factory(UserCertificate::class)->make(['user_id'=> $user->id])->toArray();

                $user_certificate = UserCertificate::updateOrCreate(
                    [
                        'user_id'=> $user->id,
                        'certificate_id' => $user_certificate_arr['certificate_id']
                    ],
                    $user_certificate_arr);

                $user_certificate->documents()->addMedia($file, 'certificates_docs');
            }
        }
    }
}
