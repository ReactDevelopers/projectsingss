<?php

namespace App\Http\Controllers\Api\Sections\Myprofile\Concerns;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\UniqueAttributeWithTrashed;
use App\Rules\MobileNo;
use App\Services\Sms;
use App\Notifications\DataVerificationToken as DataVerificationTokenNotification;
use App\Lib\SgApp;

Trait  UpdateProfileTrait {

    protected $user;

    /**
    * Get the user information
    *
    * @param  \Illuminate\Http\Request  $request
    * @return instance of App\User
    **/

    protected function updateProfile(Request $request, $user) {

        if($request->hasFile('profile_image.file')) {

            $user->profileImage()->addMedia($request->profile_image, 'profile_image', false);
        }


        $request_data = $request->only(['email','mobile_no', 'name_at_work','name','email_verified_at','mobile_verified_at','service_ids','ahpc','branch_id','branch_ids','institute_ids','employee_id','options','profession_id']);

        $request_data['service_ids'] = SgApp::arrayValToInt($request->service_ids);
        $request_data['branch_ids'] = SgApp::arrayValToInt($request->branch_ids);
        $request_data['institute_ids'] = SgApp::arrayValToInt($request->institute_ids);

        if($request->branch_id) {
            unset($request_data['branch_id']);
        }


        if($request->ahpc_expiry_date) {
            $request_data['ahpc_expiry_date'] = $request->ahpc_expiry_date;
        }

        $user->update($request_data);

        return $this->profile($user);
    }


    /**
     * Fetch Current user profile.
     */
    private function profile ($user) {

        $profile = \App\Models\User::with([
            'certificates',
            'institute',
            'branch',
            'profession',
            'services',
            'profileImage',
            'canWorkAt',
            'role'
        ])->find($user->id);

        $permissions = $profile->role()->first()->permissions()->get()->pluck('name')->toArray();
        $profile->permissions = $permissions;
        return $profile;
    }

    /***
     * function to validation the given request
     */

    private function validation(Request $request, $user){

        $this->validate($request,[
            'name'                  => ['required','max:100'],
            'name_at_work'          => [$user->role_id == 3 || $user->role_id == 3 ? 'required':'','max:100'],
            'employee_id'           => 'max:20',
            'email'                 => ['required', 'email', new UniqueAttributeWithTrashed($user->id,'App\Models\User')],
            'mobile_no'             => ['required','min:8', 'max:17', new MobileNo(), new UniqueAttributeWithTrashed($user->id, 'App\Models\User')],
            'profile_image.file'    => 'image',
            /* 'service_ids'           => 'required',
            'branch_ids'            => 'required',*/
            'institute_ids'          => [$user->role_id == 3 ? 'required':''],
            'ahpc_expiry_date'       => ['nullable','date', 'date_format:Y-m-d']
            // 'branch_id'             => 'required',
        ],[],[
           'options.numOfInstitute' => 'Number Of Intitute'
        ]);
    }

    /**
     *  fucntion for updating the mobile number
     */
    private function sentVerificationToken(Request $request , $user){
        $this->storeToken($request, 'mobile_no', 'mobile_no');

        $data = [
            'user_verification' => $this->userVerification->toArray(),
        ];

        try {

            $sms = new Sms($request->mobile_no, 'DATA_VERFICATION_SMS', $data);
            $sms->send();
        }
        catch(\Exception $e) {
            // return $this->setErrorCode('invalid_mobile')->setError($e->getMessage())->response(500);
        }
        $request->request->add(['mobile_verified_at' => null ]);
    }

    /**
     *  function for updating the email number
     */
    private function notifyChangeEmail(Request $request,$user){

        $this->storeToken($request, 'email', 'email');

        // Send Email Verification link
        $user->notify(new DataVerificationTokenNotification($this->userVerification, ['email']) );

        $request->request->add(['email_verified_at' => null ]);
    }
}
