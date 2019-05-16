<?php

namespace App\Http\Controllers\Api\Sections\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\UserVerification;
use App\Notifications\DataVerificationToken as DataVerificationTokenNotification;
use App\Notifications\Welcome;
use App\Rules\UniqueAttributeWithTrashed;
use App\Rules\MobileNo;
use App\Rules\InstituteBranch;
use App\Models\User;
use App\Models\Role;
use App\Services\Sms;

class RegisterController extends Controller
{

    use Concerns\AuthTrait, Concerns\DataVerificationToken;

    private $token_for = 'mobile_verify_before_reg';

    /**
     * To handle the create user and mobile no verification request.
     */
    public function register(Request $request) {

        if($request->has('mobile_no')) {

            return $this->checkMobileNumber($request);
        }

        return $this->create($request);
    }

    /**
     * To register as new user
     */
    private function create(Request $request) {

        $this->validation($request);
        /**
         * Check token is valid or not.
         */
       $this->checkValidToken($request->token);


        $mobile_no = $this->user_verification->mobile_no;

        $this->user = $user = User::create([
            'name'                  => $request->name,
            'name_at_work'          => $request->name_at_work,
            'gender'                => $request->gender,
            'mobile_no'             => $mobile_no,
            'email'                 => $request->email,
            'employee_id'           => $request->employee_id,
            'mobile_verified_at'    => \Carbon\Carbon::now()->toDateTimeString(),
            'password'              => \Hash::make($request->password),
            'profession_id'         => $request->profession_id,
            'institute_ids'         => $request->institute_ids,
            'branch_id'             => $request->branch_id,
            'branch_ids'            => $request->branch_id ? [$request->branch_id] : null,
            'role_id'               => Role::where('name', 'employee')->first()->id,
            'options'               => ['isMultipleInstitute'=>'no','total_institute' => 10]
        ]);

        if($request->hasFile('profile_image.file')) {

            $user->profileImage()->addMedia($request->profile_image, 'profile');
        }

        $this->storeToken($request, 'email', 'email');

        // Sned Email Verification link
        $user->notify(new DataVerificationTokenNotification($this->userVerification, ['email']) );

        //WELCOME_MAIL
        $user->notify(new Welcome(['email']) );

        return $this->setData([
            'user' => $user
        ])
        ->response(200);
    }

    private function username() {

        return 'mobile_no';
    }

    /**
     * Validate  the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */

    protected function validation(Request $request)
    {
    	$request->validate([
            'name'			        => 'required|max:100',
            'name_at_work'			=> 'required|max:100',
            'token'                 => 'required',
    		'gender' 				=> 'required|in:female,male',
    		'email' 				=> ['required','email', new UniqueAttributeWithTrashed(null,'App\Models\User')],
    		'password' 				=> ['required', 'min:8','max:16'],
    		'confirm_password' 		=> 'required_with:password|same:password',
            'profession_id' 		=> 'required',
            'employee_id'           => 'max:20',
    		'institute_ids' 		=> 'required',
    		'branch_id' 			=> ['required'],
        ]);

    }
    /**
     * To veirfy the Mobile number before registration
     */
    private function checkMobileNumber(Request $request) {

        $request->validate([
            'mobile_no' => ['required','min:8','max:16', new MobileNo, new UniqueAttributeWithTrashed(null,'App\Models\User')]
        ]);

        $this->user = User::where('mobile_no', $request->mobile)
            ->withTrashed()
            ->first();

        /**
         * If the mobile number already register in database,
         * So we are also checking the status of account like: acount is active or deactivated.
         */
        if($this->user) {

            $this->sgUserCondition($request);

            $this->setErrorCode('mobile_already_exists');
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.mobile_already_exists')],
            ]);
        }

        $this->storeToken($request, 'mobile_no', 'mobile_no');

        $data = [
            'user_verification' => $this->userVerification->toArray(),
        ];

        try {

            $sms = new Sms($request->mobile_no, 'DATA_VERFICATION_SMS', $data);
            $sms->send();

            // return $this->setData([
            //     'user_verification' => $this->userVerification
            // ])->response(200);
        }
        catch(\Exception $e) {

           // return $this->setErrorCode('invalid_mobile')->setError($e->getMessage())->response(500);
        }

        return $this->setData([
            'user_verification' => $this->userVerification
        ])->setMessage(trans('auth.otp_sent'))->response(200);
    }
}
