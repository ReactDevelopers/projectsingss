<?php

namespace App\Http\Controllers\Api\Sections\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\UserVerification;

class ResetPasswordController extends Controller
{
    use Concerns\DataVerificationToken;

    /**
     * To Reset the password by token
     */
    public function resetPassword(Request $request) {

        $this->validate($request,[
            'token' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $this->checkValidToken($request->token);

        // Get User Information

        $user = \App\Models\User::find($this->user_verification->user_id );
        $user->update(['password' => \Hash::make($request->password)]);

        return $this->setData(['profile' => $user])
            ->setMessage(trans('auth.reset_password_success'))
            ->response(200);
    }
}
