<?php

namespace App\Http\Controllers\Api\Sections\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Passport\Passport;
use Laravel\Passport\Bridge\AccessTokenRepository;
use App\Models\User;
use App\Models\UserVerification;
use App\ModelFilters\Universal\UserFilter;
use App\Http\Controllers\Api\Sections\MyProfile\Concerns\UpdateProfileTrait;
use App\Http\Controllers\Api\Sections\Auth\Concerns\DataVerificationToken;
use App\Http\Controllers\Api\Sections\Auth\Concerns\AuthTrait;
use App\Notifications\ResetPassword;
use App\Rules\ValidBranch;
use App\Lib\SgApp;
use Illuminate\Validation\ValidationException;
use App\Jobs\SendPushNotificationJob;

class UserController extends Controller
{
    use  DataVerificationToken,AuthTrait,UpdateProfileTrait;

    private $token_for = 'data_verification';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::filter($request->all(), UserFilter::class);

        # When login user can access their institue user list
        if(app('permission')->hasTag('only_my_institute')){

            $institute_ids = \Auth::user()->institute_ids;
            if($institute_ids) {
                $users->where(function($q) use($institute_ids) {

                    foreach($institute_ids as $institute_id) {

                        $q->orWhereJsonContains('institute_ids', $institute_id);
                    }
                });
            }
            else {
                $users->where('users.id', -1);
            }
        }

        $users = $request->page == -1 ? ['data' => $users->get()] : $users->paginate($request->page_size);

        return $this->setData($users)
            ->response();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with([
            'certificates' => function ($q) {
                $q->with('certificate', 'documents');
            },
            'profileImage',
            'profession',
            'services',
            'institute' => function ($q) {
                $q->with(['branches' => function ($q){
                    $q->select('id', 'name', 'institute_id');
                }])->select('id', 'name');
            },
            'canWorkAt',
            'branch'
        ])->findOrFail($id);

        # Check permission
        app('permission')->throwExceptionInstituteNotMatched('only_my_institute', $user);

        $certificates = $user->certificates->map(function($certificate){

            $documents = $certificate->documents && isset($certificate->documents[0]) ? $certificate->documents[0] : null;
            $certificate->setRelation('documents', $documents);
            return $certificate;

        })->toArray();

        $user->setRelation('certificates.documents', $certificates);

        return $this->setData([
            'user' => $user,
        ])
        ->response(200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        # Check permission
        app('permission')->throwExceptionInstituteNotMatched('only_my_institute', $user);

        $this->validation($request, $user);

        $user = $this->updateProfile($request,$user);

        return $this->setData([
            'user' => $user,
            'MAX_INSTITUTE_OF_USER' => app('site_config')->get('MAX_INSTITUTE_OF_USER', 10),
        ])
        ->response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if($request->check) {

            return $this->checkToDelete($request,$id);
        }
        else{

            $user = User::where('id',$id)->first();

            # Check permission
            app('permission')->throwExceptionInstituteNotMatched('only_my_institute', $user);
            $user->deleted_at ? $user->forceDelete() : $user->delete();
            return $this->setMessage('User has been deleted successfully.')->response(200);
        }

    }

    /**
     * validate record for being deleted
     *
     * @param   $request,$id
     * @return \Illuminate\Http\Response
     */
    private function checkToDelete($request,$id){

        $message = 'Are you sure you want to delete this user? ';
        return $this->setMessage($message)->response(200);
    }

    /***
     * To restore the soft deleted user
     */
    public function restore(Request $request,$id){

        $user = User::where('id',$id);
        # check Permission
        app('permission')->throwExceptionInstituteNotMatched('only_my_institute', $user);

        $user->restore();
        $message = 'User has been restore  successfully.';
        return $this->setMessage($message)->response(200);
    }

    /**
     * To Reset the User password.
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(Request $request,$id) {

        $this->validate($request,[
            'password' 				=> ['required', 'min:8','max:16'],
    		'confirm_password' 		=> 'required_with:password|same:password',
        ]);

        $user = User::findOrFail($id);

        # Check permission
        app('permission')->throwExceptionInstituteNotMatched('only_my_institute', $user);

        $user->update(['password' => \Hash::make($request->password)]);
        $user->notify(new ResetPassword($request->password));

        $this->setMessage(trans('auth.password_changed_success'))
            ->setData(['profile' => $this->profile($user) ]);

        return $this->response();
    }

    public function addAdditionalInformation($id, Request $request) {

        $this->validate($request,[
            'additional_informations.*.label' => ['required', 'max:100'],
            'additional_informations.*.value' => ['required', 'max:100'],
        ]);

        $user = \App\Models\User::find($id);

        # Check when Login User only have the privillage  to ad additional information of their institute's users
        app('permission')->throwExceptionInstituteNotMatched('only_my_institute', $user);

        $user->update(['additional_informations' => $request->additional_informations]);

        return $this->setData([
            'user' => $user
        ])->response();
    }

    /**
     * Send Push Notification to User.
     */
    public function sendPushNotification($id, Request $request) {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'type' => 'required'
        ]);

        $user = \App\Models\User::findOrFail($id);
        # Check when Login User only have the privillage  to send the push notification of their institute's users
        app('permission')->throwExceptionInstituteNotMatched('only_my_institute', $user);

        $tokens = \App\Lib\SgApp::getUserDeviceToken([$id]);
        $tokens = $tokens->get();
        $valid_devices = 0;

        foreach($tokens as $token) {

            if($token->settings) {
                $setting = \json_decode($token->settings, true);
                if($setting['enable_roster_push_notification'] == 'Yes') {
                    $valid_devices++;
                }
            }
            else {
                $valid_devices++;
            }
        }

        if($valid_devices === 0) {
            throw ValidationException::withMessages(['user_id' => 'Setting is not enable in user device.']);
        }
        SendPushNotificationJob::dispatch([$id], [], $request->type, $request->title, $request->body);
        return $this->setMessage('Push Notification has been sent successfully.')->response();
    }
}
