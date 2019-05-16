<?php

namespace App\Http\Controllers\Api\Sections\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use League\OAuth2\Server\CryptTrait;
use Laravel\Passport\Passport;
use League\OAuth2\Server\Exception\OAuthServerException;

class LoginController extends Controller {

    use AuthenticatesUsers, Concerns\AuthTrait, CryptTrait;


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
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {

        $token = $this->user->createUserToken();
        $device = $this->linkToDevice($request)->only('pivot');

        if($request->device_token) {

            $request->device()->update(['device_token' => $request->device_token]);
        }

        return $this->setData([
            'profile' => $this->user,
            'device' => $device['pivot'],
            'token' => $token
        ])
        ->response();
    }

    /**
     * Update the device and user relation.
     */
    protected function linkToDevice($request) {

        $user_device = $this->user->devices()->where('devices.id', $request->device()->id)->first();
        $max_login_index = $request->device()->users()->withTrashed()->max('login_index');
        $max_login_index = $max_login_index !== null ? $max_login_index +1 : 0;

        if(!$user_device) {

            $request->device()->users()->syncWithoutDetaching([$this->user->id =>
                [
                'login_index' => $max_login_index,
                'settings' => [
                        'enable_event_push_notification' => 'Yes',
                        'enable_roster_push_notification' => 'Yes',
                        'enable_certificate_expire_push_notification' => 'Yes',
                    ]
                ]
            ]);
        }
        else {

            $request->device()->users()->syncWithoutDetaching([$this->user->id => ['active' => 'Yes', 'revoked' => '0']]);
        }

        return $this->user->devices()->where('devices.id', $request->device()->id)->first();
    }
    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [$this->getLoginLabel($request)=>$request->{$this->username()}, 'password'=>$request->password];
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request) {

        // Get the User data from data
        $this->user($request);

        // Check privilege to acceess the portal
        $this->portalAccess($request);

        // Check Application Conditions
        $this->sgUserCondition($request);

        // Verify :Password
        $this->verifyPassword($request);

        // Check Email or mobile number is verified.
        $this->hasUnverifiedLabel($request);

        return true;
    }
    /**
     * Generate the access token from refresh token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function refreshToken(Request $request) {

        $this->validate($request,[
            'refresh_token' => 'string',
        ]);

        $this->setEncryptionKey(app('encrypter')->getKey());
        $refresh_token = json_decode($this->decrypt($request->refresh_token));
        $oauth_refresh_tokens = \DB::table('oauth_refresh_tokens')->where('id', $refresh_token->refresh_token_id)->first();

        // When refresh token does not exists in database.
        if(!$oauth_refresh_tokens) {

            $this->setErrorCode('refresh_token_not_exist');
            throw OAuthServerException::invalidRefreshToken();
        }

        // Check Refresh token expire date
        if(\Carbon\Carbon::parse($oauth_refresh_tokens->expires_at)->isPast()){

            $this->setErrorCode('refresh_token_expired');
            throw OAuthServerException::invalidRefreshToken();
        }

        if($oauth_refresh_tokens->revoked == 1){

            $this->setErrorCode('refresh_token_revoked');
            throw OAuthServerException::invalidRefreshToken();
        }

        $access_token = \DB::table('oauth_access_tokens')->where('id', $refresh_token->access_token_id)->first();

        if(!$access_token){

            $this->setErrorCode('access_token_not_exist');
            throw OAuthServerException::invalidRefreshToken();
        }

        if($access_token->client_id != $request->client()->id ) {

            $this->setErrorCode('refresh_token_invalid_client');
            throw OAuthServerException::invalidGrant();
        }

        if($access_token->device_id != $request->device()->id ) {

            $this->setErrorCode('refresh_token_invalid_device');
            throw OAuthServerException::invalidGrant();
        }

        $this->user = \App\Models\User::withTrashed()
        ->with([
            'certificates',
            'institute',
            'branch',
            'profession',
            'services',
            'profileImage'
        ])->find($refresh_token->user_id);

        if(!$this->user) {
            throw OAuthServerException::accessDenied();
        }

        $token = $this->user->createUserToken();

        // Revoked the refresh token.
        \DB::table('oauth_refresh_tokens')->where('id', $refresh_token->refresh_token_id)->update([
            'revoked' => 1
        ]);

        $device = $this->linkToDevice($request)->only('pivot');

        return $this->setMessage('auth.token_grantted')
            ->setData([
                'token' => $token,
                'device' => $device['pivot'],
                'profile' => $this->user,
            ])
            ->response();
    }
}
