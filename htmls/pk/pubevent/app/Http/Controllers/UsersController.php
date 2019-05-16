<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class UsersController extends Controller {

    /**
     * Getting Officer list from the database.
     * @param  Request $request [description]
     * @return Instance of Response
     */
    public function index(Request $request)
    {
        $users = \App\User::select('users.id','users.name', 'email','pubnet_id','role_id',
            DB::raw('IF(roles.id is NULL, "N/A", roles.title) as role_name'), 
            DB::raw('IF(recipient = 1, "To", IF(recipient=2, "CC", "N/A")) as recipient'))
        ->leftJoin('roles','roles.id','=','users.role_id');

        if($request->has('searchdata') && $request->searchdata){
            
            $users->where(function($q) use($request){
                $q->orWhere('users.email','LIKE',"%{$request->searchdata}%");
                $q->orWhere('users.name','LIKE',"%{$request->searchdata}%");
                $q->orWhere('users.pubnet_id','LIKE',"%{$request->searchdata}%");
                $q->orWhere('roles.name','LIKE',"%{$request->searchdata}%");
            });
        }
        if ($request->has('sortName')) {
            switch ($request->sortName) {
                case 'name':
                    $users->orderBy('users.name',$request->sortOrder);
                    break;
                case 'pubnet_id':
                    $users->orderBy('users.pubnet_id',$request->sortOrder);
                    break;               
                case 'email':
                    $users->orderBy('users.email',$request->sortOrder);
                    break;

                case 'role_name':
                    $users->orderBy('roles.title',$request->sortOrder);
                    break; 
                case 'recipient':
                    $users->orderBy('recipient',$request->sortOrder);
                    break;           
                default:
                    # code...
                    break;
            }
        }
        $users = $users->paginate($this->sizePerPage);
        $this->data = $users;
        return $this->response();
    }
    public function roles(Request $request){

        $this->data = \App\Models\Role::all();
        return $this->response();
    }
    /**
     * Getting the user information by the user id
     * @param  Request $request [description]
     * @param  [type]  $user_id [description]
     * @return Json
     */
    public function get(Request $request,$user_id)
    {
        $this->data = \App\User::find($user_id);
        return $this->response();
    }

    /**
     * Updating the user information.
     * @param  Request $request [description]
     * @param  [number]  $user_id [User id, whom details need to update]
     * @return [Json] 
     */
    public function update(Request $request,$user_id)
    {
        $validator = \Validator::make($request->all(),[
            'recipient'=>'nullable|in:1,2',
            'role_id'=>'nullable',
        ],
        [
           //'recipient.required' =>'Recipient is required.', 
        ]
        );

        if($validator->fails()){

            $this->status = false;
            $this->message = 'Please enter the valid details.';
            $this->errors = $validator->errors();

        }else{

            $this->message = 'User detail has been updated.';
            $this->data = \App\User::find($user_id)->update($request->only('recipient','role_id'));
        }

        return $this->response();
    }
    /**
     * This function uses to update the user status as deleted
     * @param  Request $request [description]
     * @param  [type]  $user_id [description]
     * @return [type]           [description]
     */ 
    public function delete(Request $request,$user_id)
    {
        $this->message = 'User has been deleted successfully.';
        \App\User::find($user_id)->delete();
        return $this->response();
    }
}
