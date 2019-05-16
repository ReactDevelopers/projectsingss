<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	

    protected $user;

    public function __construct(){

       $this->middleware(\App\Http\Middleware\CorsMiddleware::class);

    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function loginAction(Request $request)
    {
        $validate = $this->validateLogin($request);       

        if($validate->fails()){

            $this->errors = $validate->errors();
            $this->status = false;
            $this->message = trans('message.login_failed');
            return $this->response(200);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    
    protected function validateLogin(Request $request)
    {
        $validate = $this->getValidationFactory()->make($request->all(), [
            $this->username() => 'required|string',
            'password' => 'required|string',
            'device_id'=>'required|string',
        ]);

        return $validate;
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {

        if($user = $this->user($request)){

            return app('hash')->check($request->password, $user->password);
        }

        return false;
    }

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
        $this->user = \App\User::where('email',$request->{$this->username()})
        ->first();
        return $this->user;
    }
   

    
    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {  
       
       return [$this->getLoginLable($request)=>$request->{$this->username()},'password'=>$request->password];

    }

    /**
     * Send the response after authentication successful.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
       
        $this->status = true;
        $this->message = trans('message.login_success');
        $token = $this->user->createToken('TMS')->accessToken;

        $this->data['user'] = $this->user;
        $this->data['token'] = $token;
        return $this->response();
    }

    /** 
    * Finding the label, which is using by user to the login attamp like: email,mobile_no,password
    * @param  \Illuminate\Http\Request  $request
    * @return String
    */

    protected function getLoginLable(Request $request)
    {

        if(filter_var($request->{$this->username()}, FILTER_VALIDATE_EMAIL)){
            return 'email';

        }elseif(preg_match('/^(\+|[0-9]){1,3}(\-)([0-9]){6,10}$/', $request->{$this->username()})){

            return 'mobile_no';
        }else{

            return 'user_name';
        }
    } 

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $this->errors = [[$this->username() => trans('auth.failed')]];
        $this->status = false;
        $this->message = trans('auth.failed');
        return $this->response(200);
    }


    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    protected function username()
    {
        return 'username';
    }

       
}