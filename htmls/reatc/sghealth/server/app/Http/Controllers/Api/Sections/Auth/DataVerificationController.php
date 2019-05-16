<?php

namespace App\Http\Controllers\Api\Sections\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\UserVerification;
use App\Notifications\DataVerificationToken as DataVerificationTokenNotification;

class DataVerificationController extends Controller
{
    use Concerns\AuthTrait, Concerns\DataVerificationToken;

    protected $token_for = 'data_verification';

     /**
     * Handle to send the token for email or mobile verification
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendToken(Request $request) {

        $this->validateEmail($request);
        // Get the User data from data
        $this->user($request);
        // Check Application Conditions
        $this->sgUserCondition($request);

        // Check Email or mobile number is verified.
        $this->hasVerifiedLabel($request);

        $label =  $this->getLoginLabel($request);
        $this->storeToken($request, $label);

        $broadcast = $label =='email' ? ['email'] : ['sms'];
        $this->user->notify(new DataVerificationTokenNotification($this->userVerification, $broadcast) );

        return $this->setData([
            'user' => $this->user,
            'user_verification' => $this->userVerification
        ])
        ->response(200);
    }

    /**
     * Handle request to verified the user data
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function verifyData(Request $request) {

        $this->validate($request,[
            'token' => 'required',
        ]);

        $this->checkValidToken($request->token);

        // Get User Information

        $this->user = \App\Models\User::find($this->user_verification->user_id );

        if(!$this->user){

            throw ValidationException::withMessages([
                'token' => [trans('auth.user_not_exist')],
            ]);
        }

        $field = $this->user_verification->email ? 'email_verified_at' : 'mobile_verified_at';

        $this->user->update([$field => \Carbon\Carbon::now()->toDateTimeString()]);

        return $this->setData(['profile' => $this->user])
            ->setMessage(trans('auth.'.$field.'_success'))
            ->response(200);
    }

    /**
     * To check valid a otp
     */
    public function verifyOtp(Request $request) {

        $this->validate($request,[
            'token' => 'required',
        ]);

        $this->checkValidToken($request->token, false);

        return $this->setMessage(trans('auth.otp_verified'))->response();
    }


}
