<?php

namespace App\Http\Controllers\Api\Sections\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\UniqueAttributeWithTrashed;
use App\Rules\MobileNo;
use App\Models\User;
use App\Models\Role;
use App\Notifications\UserCreateNotification;
use App\Rules\ValidBranch;


class UserCreateController extends Controller
{

    /**
    register new employee */
    public function storeEmpolyee(Request $request){

        $request->validate([
            'name'			        => 'required|max:100',
            'name_at_work'			=> 'required|max:100',
            'email' 				=> ['required','email', new UniqueAttributeWithTrashed(null,'App\Models\User')],
            'mobile_no' => ['required','min:8','max:16', new MobileNo, new UniqueAttributeWithTrashed(null,'App\Models\User')],
            'profession_id' 		=> 'required',
            'employee_id'           => 'max:20',
    		'institute_ids' 		=> 'required',
    		'branch_id'     		=> ['required',new ValidBranch($request->institute_ids)],
    		'branch_ids' 			=> ['required',new ValidBranch($request->institute_ids)],
    		'ahpc'      			=> ['required','in:full,conditional,temporary'],
            'ahpc_expiry_date'		=> ['required'],
            'profile_image.file'	=> ['required'],
        ]);

        $user = $this->create($request);

        return $this->setData([
            'user' => $user
        ])
        ->response(200);
    }

    public function storeManager(Request $request){
        $request->validate([
            'name'			        => 'required|max:100',
            'email' 				=> ['required','email', new UniqueAttributeWithTrashed(null,'App\Models\User')],
            'profession_id' 		=> 'required',
    		'institute_ids' 		=> 'required',
            'profile_image.file'	=> ['required'],
            ]);

        $user = $this->create($request);

        return $this->setData([
            'user' => $user
        ])
        ->response(200);
    }

    public function storeEventManager(Request $request){
        $request->validate([
            'name'			        => 'required|max:100',
            'profession_id' 		=> 'required',
            'email' 				=> ['required','email', new UniqueAttributeWithTrashed(null,'App\Models\User')],
            'profile_image.file'	=> ['required'],
        ]);

        $user = $this->create($request);

        return $this->setData([
            'user' => $user
        ])
        ->response(200);
    }

    /**
        store user info
     */
    private function create(Request $request){

        $password = rand(111111,999999);

        $user = User::create([
            'name'                  => $request->name,
            'name_at_work'          => $request->name_at_work,
            'mobile_no'             => $request->mobile_no,
            'email'                 => $request->email,
            'employee_id'           => $request->employee_id,
            'mobile_verified_at'    => $request->mobile_no ? \Carbon\Carbon::now()->toDateTimeString() : null,
            'email_verified_at'     => \Carbon\Carbon::now()->toDateTimeString(),
            'password'              => \Hash::make($password),
            'profession_id'         => $request->profession_id,
            'institute_ids'         => $request->institute_ids,
            'branch_id'             => $request->branch_id,
            'branch_ids'            => $request->branch_id ? [$request->branch_id] : null,
            'role_id'               => Role::where('name',$request->role)->first()->id,
            'options'               => ['isMultipleInstitute'=>'no','total_institute' => 10],
            'ahpc'                  => $request->ahpc,
            'ahpc_expiry_date'      => $request->ahpc_expiry_date,
            'service_ids'           => $request->service_ids,
        ]);

        if($request->hasFile('profile_image.file')) {

            $user->profileImage()->addMedia($request->profile_image, 'profile');
        }

        //WELCOME_MAIL
        $user->notify(new UserCreateNotification($password) );
        return $user ;

    }
}
