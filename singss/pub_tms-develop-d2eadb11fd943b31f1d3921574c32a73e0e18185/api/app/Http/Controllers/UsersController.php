<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller {

    /**
     * Getting Officer list from the database.
     * @param  Request $request [description]
     * @return Instance of Response
     */
    public function index(Request $request)
    {
       
        $users = \App\User::select('users.id','users.name', 'email','pubnet_id','role_id','department_id','designation','division','section','branch','departments.name as department_name', 'roles.title as role_name')
        ->leftJoin('roles','roles.id','=','users.role_id')
        ->leftJoin('departments','departments.id','=','users.department_id');

        if($request->searchdata){

            $users->where(function($q) use($request){
                $q->orWhere('users.email','LIKE',"%{$request->searchdata}%");
                $q->orWhere('users.name','LIKE',"%{$request->searchdata}%");
                $q->orWhere('users.pubnet_id','LIKE',"%{$request->searchdata}%");
                $q->orWhere('departments.name','LIKE',"%{$request->searchdata}%");
                $q->orWhere('roles.name','LIKE',"%{$request->searchdata}%");
            });
        }

        switch ($request->sortName) {
            case 'name':
                $users->orderBy('users.name',$request->sortOrder);
                break;
            case 'pubnet_id':
                $users->orderBy('users.pubnet_id',$request->sortOrder);
                break; 
            case 'department_name':
                $users->orderBy('departments.name',$request->sortOrder);
                break; 
            case 'email':
                $users->orderBy('users.name',$request->sortOrder);
                break;           
            
            default:
                # code...
                break;
        }

        $users = $users->paginate($request->sizePerPage);
        $this->data = $users;
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
        $this->data['user'] = \App\User::find($user_id);
        $this->data['departments'] = \App\Models\Department::all();
        $this->data['roles'] = \App\Models\Role::all();
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
            'department_id'=>'required',
            'pubnet_id' =>'required|unique:users,pubnet_id,'.$user_id.',id',
            'email'=>'required|unique:users,pubnet_id,'.$user_id.',id|email',
            'designation'=>'required|max:255',
            'division'=>'required|max:255',
            'branch'=>'required|max:255',
            'section'=>'required|max:255',
            'role_id'=>'required',
            'name'=>'required|max:255'
        ]);

        if($validator->fails()){

            $this->status = false;
            $this->message = 'Please enter the valid details.';
            $this->errors = $validator->errors();

        }else{

            $this->message = 'User detail has been updated.';
            \App\User::find($user_id)->update($request->all());
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
        //werw
        //sleep(3);
        $this->message = 'User has been deleted successfully.';
        \App\User::find($user_id)->delete();
        return $this->response();
    }


    /**
     * Handling the upload file request
     * @param  Request $request Instance of Request
     * @return Json
     */
    public function upload(Request $request)
    {

        $v = \Validator::make($request->all(),[
            'user_file'=>'required|file'
        ]);

        
        $file_name = $request->file('user_file')->getClientOriginalName();

        $v->after(function($v) use($file_name){

            $file_name_arr = explode('.', $file_name);
            $ext = strtolower(end($file_name_arr));
            $allow_ext = ['xml'];
            if(!in_array($ext, $allow_ext)){

                $v->errors()->add('user_file','Only XML file is allowed.');
            }
        });

        if($v->fails()){

            $this->errors = $v->errors();
            $this->status = false;
            $this->message = $v->errors()->first();
            
        }else{

            $updator = new \App\Lib\DataUpdater($request->file('user_file')->getpathname());
            
            if($updator->error_message){

                $this->status = false;
                $this->message = $updator->error_message;

            }else{
                
                $this->status = true;
                $this->data['joiners'] = $updator->joiners;
                $this->data['movers'] = $updator->movers;
                $this->data['leavers'] = $updator->leavers;
                $this->message = 'message.user.uploaded_success';
            }
        }
        return $this->response();
    }

}
