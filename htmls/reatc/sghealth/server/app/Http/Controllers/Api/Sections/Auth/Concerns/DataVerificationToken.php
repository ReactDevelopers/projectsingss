<?php

namespace App\Http\Controllers\Api\Sections\Auth\Concerns;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\UserVerification;

Trait DataVerificationToken
{
    protected $userVerification;
    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }
    /**
     * Store the Token in database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    private function storeToken(Request $request, $label, $key='email')
    {
        $token =   rand(100000, 999999);

        $this->userVerification =  UserVerification::create([
            'user_id' => isset($this->user) ?  $this->user->id : null,
            'token'   => $token,
            'email' => $label== 'email' ? $request->{$key} : null,
            'mobile_no' => $label== 'mobile_no' ? $request->{$key} : null,
            'purpose' => $this->token_for
        ]);
    }
    /**
     * Validate the email for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $request->validate([$this->username() => 'required']);
    }
    /**
    * Check if user tring to login with unverified email or mobile.
    * @param  \Illuminate\Http\Request  $request
    * @return Throw Exception
    **/
    protected function hasVerifiedLabel(Request $request) {

        $label = $this->getLoginLabel($request);
        $user = $this->user;
        if($label =='email' && $user->email_verified_at){

            $this->setErrorCode('email_already_verified');

            throw ValidationException::withMessages([
                $this->username() => [trans('auth.email_already_verified')],
            ]);

        }
        else if ($label =='mobile_no' && $user->mobile_verified_at ){

            $this->setErrorCode('mobile_already_verified');

            throw ValidationException::withMessages([
                $this->username() => [trans('auth.mobile_already_verified')],
            ]);
        }
    }
    /**
     * To check the valid token
     * @param String token
     */
    protected function checkValidToken($token, $should_delete = true) {

        $now_reduce_mins =  \Carbon\Carbon::now()->addMinutes(-120)->toDateTimeString();
        $this->user_verification = UserVerification::where(function($q) use($token) {

                if(env('APP_ENV') != 'production') {
                    $q->orWhere('token', $token)
                    ->orWhere('mobile_no', $token);
                }
                else {

                    $q->where('token', $token);
                }
        })
        ->where('created_at','>=', $now_reduce_mins)
        ->first();

        // Check token a valid token is exists or not in database

        if(!$this->user_verification) {

            $this->setErrorCode('token_not_exist_or_may_be_expire');

            throw ValidationException::withMessages([
                'token' => [trans('auth.token_not_exist_or_may_be_expire')],
            ]);
        }

        if($should_delete)
        $this->deleteUsedToken();
    }
    protected function deleteUsedToken() {

        $this->user_verification->delete();
    }
}
