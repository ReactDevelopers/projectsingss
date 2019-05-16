<?php

namespace App\Http\Controllers\Api\Sections\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\UniqueAttributeWithTrashed;
use App\Models\User;
use App\Models\Role;
use App\Models\Event;
use Illuminate\Http\UploadedFile;


class CreateManagerController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerManager(Request $request)
    {
        
        $isAlreadyExist = User::where('email',decrypt($request->email))->first();
        
        if($isAlreadyExist) { 
            return $this->setMessage('You are already registered with us')
            ->response();
        }
        
        $this->validation($request);

        $user = User::create([
            'name'          => $request->name,
            'email'         => decrypt($request->email),
            'password'      => bcrypt($request->password),
            'role_id'       => Role::where('name',$request->role)->first()->id,
        ]);

        $file['file'] = UploadedFile::fake()->image('avatar.jpg', 600, 600);
        $user->profileImage()->addMedia($file, 'profile');

        if($user){
            Event::where('manager_email',$user->email)->update(['manager_id'=>$user->id,'manager_email'=> NULL]);
        }
        return $this->setData($user)
            ->setMessage('You are registered successfully')
            ->response();
    }


    protected function validation(Request $request){

        $request->validate([
            'name'                      => ['required','max:100'],
            'password'                  => ['required','min:6','max:16'],
            'email' 				    => ['required'],
            ]);
        }

}
