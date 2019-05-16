<?php

namespace App\Http\Controllers\Api\Sections\Auth\Concerns;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

Trait  AuthTrait {

    protected $user;

    /**
    * Get the user information
    *
    * @param  \Illuminate\Http\Request  $request
    * @return instance of App\User
    **/

    protected function user(Request $request)
    {
        if($this->user){

            return $this->user;
        }
        $this->user = \App\Models\User::where(function ($q) use($request) {
            $q->orwhere('email', $request->{$this->username()})
            ->orWhere('mobile_no', $request->{$this->username()});

        })->withTrashed()
        ->with([
            'certificates',
            'institute',
            'role',
            'branch',
            'profession',
            'services',
            'profileImage'
        ])->first();

        if(!$this->user){

            throw ValidationException::withMessages([
                $this->username() => [trans('auth.user_not_exist')],
            ]);
        }

        $permissions = $this->user->role->permissions()->get()->pluck('name')->toArray();
        $this->user->permissions = $permissions;

        return $this->user;
    }

    /**
    * Check if user tring to login with unverified email or mobile.
    * @param  \Illuminate\Http\Request  $request
    * @return Throw Exception
    **/
    protected function hasUnverifiedLabel(Request $request) {

        $label = $this->getLoginLabel($request);
        $user = $this->user;
        if($label =='email' && !$user->email_verified_at){

            $this->setErrorCode('email_not_verified');

            throw ValidationException::withMessages([
                $this->username() => [trans('auth.email_not_verified')],
            ]);

        }
        else if ($label =='mobile_no' && !$user->mobile_verified_at ){

            $this->setErrorCode('mobile_not_verified');

            throw ValidationException::withMessages([
                $this->username() => [trans('auth.mobile_not_verified')],
            ]);
        }
    }

    /**
    * Finding the label, which is using by user to the login attamp like: email,mobile_no,password
    * @param  \Illuminate\Http\Request  $request
    * @return String
    */

    protected function getLoginLabel(Request $request) {

        if(filter_var($request->{$this->username()}, FILTER_VALIDATE_EMAIL)){
            return 'email';

        }
        else if(preg_match('/^(\+|[0-9]){1,3}(\-)([0-9]){6,12}$/', $request->{$this->username()})){

            return 'mobile_no';
        }
        else{

            return 'user_name';
        }
    }
     /**
     * Verify the Application valid user conditions
     */
    protected function sgUserCondition(Request $request) {

        $user = $this->user;

        if($user->deleted_at) {

            $this->setErrorCode('account_suspended');
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.account_suspended')],
            ]);
        }
        else if($user->status != 'Active') {

            $this->setErrorCode('account_inactive');
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.account_inactive')],
            ]);
        }
    }
    /**
     * To verify the Password
     */
    protected function verifyPassword(Request $request) {

        if(!\Hash::check($request->password, $this->user->password)) {

            throw ValidationException::withMessages([
                'password' => [trans('auth.password_wrong')],
            ]);
        }
    }

    private function portalAccess($request) {

        $user = $this->user;

        /**
         * Every user should have role and role should also have the access to their portal.
         */
        if($user && (!$user->role || !$user->role->client_ids || !in_array($request->client()->id, $user->role->client_ids)) ){

            $this->setErrorCode('forbidden');
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.forbidden')],
            ]);
        }
    }
}
