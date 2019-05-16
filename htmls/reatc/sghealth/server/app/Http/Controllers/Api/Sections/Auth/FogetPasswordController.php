<?php

namespace App\Http\Controllers\Api\Sections\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\UserVerification;
use Illuminate\Support\Str;
use App\Notifications\ForgetPassword;
use App\Mail\ForgetPasswordMail;

class FogetPasswordController extends Controller {

    use Concerns\AuthTrait, Concerns\DataVerificationToken;

    protected $token_for = 'reset_pasword';

     /**
     * Handle the Forget password link Request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLink(Request $request ) {

        $this->validateEmail($request);
        // Get the User data from data
        $this->user($request);
        // Check Application Conditions
        $this->sgUserCondition($request);

        // Check Email or mobile number is verified.
        $this->hasUnverifiedLabel($request);

        $label =  $this->getLoginLabel($request);
        $this->storeToken($request, $label);

        $broadcast = $label =='email' ? ['email'] : ['sms'];

        $this->user->notify(new ForgetPassword($this->userVerification, $broadcast) );

        return $this->setData([
            'user' => $this->user,
            'user_verification' => $this->userVerification
        ])->setMessage(trans('auth.otp_resent'))->response(200);
    }
}
