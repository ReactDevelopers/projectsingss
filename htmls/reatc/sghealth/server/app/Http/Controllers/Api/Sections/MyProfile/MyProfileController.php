<?php

namespace App\Http\Controllers\Api\Sections\MyProfile;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\UserVerification;
use Laravel\Passport\Passport;
use Laravel\Passport\Bridge\AccessTokenRepository;
use App\Rules\UniqueUser;
use App\Rules\MobileNo;
use App\Services\Sms;
use App\Notifications\DataVerificationToken as DataVerificationTokenNotification;
use App\Http\Controllers\Api\Sections\Auth\Concerns\DataVerificationToken;
use App\Http\Controllers\Api\Sections\Auth\Concerns\AuthTrait;
use App\Http\Controllers\Api\Sections\MyProfile\Concerns\UpdateProfileTrait;

class MyProfileController extends Controller
{
    use  DataVerificationToken,AuthTrait,UpdateProfileTrait;

    private $token_for = 'data_verification';
    /**
     * To Logout the User and invoke the token if client is ios or android
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request) {

        Passport::token()->where('id', $request->user()->token()->id)->update(['revoked' => true]);

        $user_device = $request->user()->devices()->where('devices.id', $request->device()->id)->first();

        if($user_device) {

            $request->device()->users()->syncWithoutDetaching([
                $request->user()->id => ['active' => 'No']
            ]);
        }

        $this->setMessage(trans('auth.logout_success'));
        return $this->response();
    }
    /**
     * To Get the Current User Profile Information.
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function myProfile(Request $request) {

        $user = $this->profile($request->user());

        $user->device_users = $request->device()->users()
            ->where('users.id', '<>', $user->id)
            ->with('profileImage', 'role')
            ->get();
        $my_device = $request->user()->devices()->where('devices.id', $request->device()->id)->first();

        $this->setData(['profile' => $user, 'my_device' => $my_device, 'MAX_INSTITUTE_OF_USER' => app('site_config')->get('MAX_INSTITUTE_OF_USER', 10)]);
        return $this->response();
    }

    /**
     * To update the Login user Profile
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {

        $this->user = $user = auth()->user();

        $isMobileChange =  false;
        $isEmailChange =  false;
        $updateProfile = $this->profile($user);

        $this->validation($request, $user);

        $message = 'Profile has been updated successfully';

        if($request->token) {

            $this->checkValidToken($request->token);
            $request->request->add(['mobile_verified_at' => date('Y-m-d H:i:s')]);
            $updateProfile = $this->updateProfile($request, $user);
        }
        else {


            if($user->mobile_no != $request->mobile_no){

                $message = 'OTP has been sent successfully';
                $this->sentVerificationToken($request,$user);
                $isMobileChange =  true;
            }

            if($user->email != $request->email) {

                $isEmailChange =  true;

                if($user->mobile_no == $request->mobile_no){

                    $updateProfile = $this->updateProfile($request, $user);
                }
                $this->notifyChangeEmail($request,$updateProfile);
            }

            if(($user->mobile_no == $request->mobile_no) && ($user->email == $request->email)){

                $updateProfile = $this->updateProfile($request, $user);
            }

        }

        return $this->setData([
            'isMobileChange'=>$isMobileChange,
            'isEmailChange'=>$isEmailChange,
            'profile'=> $updateProfile
        ])->setMessage($message)->response(200);


    }

    /**
     * To Reset the User password.
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(Request $request) {

        $this->validate($request,[

            'old_password'          => 'required',
            'password' 				=> ['required', 'min:8','max:16'],
    		'confirm_password' 		=> 'required_with:password|same:password',
        ]);

        // When old password does not match.
        if(!\Hash::check($request->old_password, $request->user()->password)) {

            throw ValidationException::withMessages([
                'old_password' => [trans('auth.old_password_wrong')],
            ]);
        }


        $request->user()->update(['password' => \Hash::make($request->password)]);

        $this->setMessage(trans('auth.password_changed_success'))
            ->setData(['profile' => $this->profile($request->user()) ]);

        return $this->response();
    }

    /**
     * To Update the current device information like token, os name and os version
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function updateDeviceInfo(Request $request) {

        $this->validate($request,[
            'device_token' => 'string|max:800',
            "name" => 'string|max:255',
            'info.os' => 'string',
            'info.version' => 'string'
        ]);

        $request->device()->update($request->only(['device_token', 'info', 'name']));

        return $this->setMessage(trans('auth.device_updated_success'))
            ->setData(['device' => $request->device()])
            ->response();
    }

    public function updateMyDeviceSettings(Request $request) {

        $this->validate($request, [
            'settings.enable_event_push_notification' => 'required|in:Yes,No',
            'settings.enable_roster_push_notification' => 'required|in:Yes,No',
            'settings.enable_certificate_expire_push_notification' => 'required|in:Yes,No'
        ]);

        $device_user = $request->user()->devices()->where(['device_user.device_id' => $request->device()->id])->first();

        $data = $request->settings;

        if($device_user->pivot->settings) {
            $data = array_merge($device_user->pivot->settings, $data);
        }

        $request->user()->devices()->syncWithoutDetaching([$request->device()->id => ['settings' => $data]]);

        return $this->setData([
            'device_user' => $request->user()->devices()->where(['device_user.device_id' => $request->device()->id])->first()
        ])->response();
    }
}
