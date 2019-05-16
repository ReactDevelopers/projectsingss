<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class EmailGroupController extends Controller {

    /**
     * Getting email group list from the database.
     * @param  Request $request [description]
     * @return Instance of Response
     */
    public function index(Request $request)
    {
        $email_group = \App\Models\EmailGroup::select('id','title','email',
            DB::raw('IF(recipient = 1, "To", IF(recipient=2, "CC", "N/A")) as recipient'));

        if($request->has('searchdata') && $request->searchdata){
            $users->where(function($q) use($request){
                $q->orWhere('email_group.email','LIKE',"%{$request->searchdata}%");
                $q->orWhere('email_group.title','LIKE',"%{$request->searchdata}%");
            });
        }
        if ($request->has('sortName')) {
            switch ($request->sortName) {
                case 'title':
                    $users->orderBy('email_group.title',$request->sortOrder);
                    break;             
                case 'email':
                    $users->orderBy('email_group.email',$request->sortOrder);
                    break;
          
                default:
                    # code...
                    break;
            }
        }
        $email_group = $email_group->paginate($this->sizePerPage);
        $this->data = $email_group;
        return $this->response();
    }

    /**
     * Getting the group info from group id
     * @param  Request $request [description]
     * @param  [type]  $user_id [description]
     * @return Json
     */
    public function get(Request $request,$group_id)
    {
        $this->data = \App\Models\EmailGroup::find($group_id);
        return $this->response();
    }

    /**
     * Handling the email group create request
     * @param  Request $request 
     * @return Json         
     */
    public function store(Request $request) {

        $validator = $this->validateRequest($request);

        if($validator->fails()) {

            $this->status = false;
            $this->message = 'Please enter the valid details.';
            $this->errors = $validator->errors();
            $code = 403;

        }else{

            $this->message = 'Email Group has been created successfully.';
            $group_data = $request->all();

            \App\Models\EmailGroup::create($group_data);
            $code = 200;
        }

        return $this->response($code);
    }

    /**
     * Validate the Email Group create/update request
     * @param  Request $request [description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    private function validateRequest(Request $request) {

        return  \Validator::make($request->all(),[
                'title'=>'required',
                //'recipient'=>'required|in:1,2',
                'email'=>'required|email',
            ],
            [
               'title.required' =>'Title is required.', 
               'email.required' =>'Email is required.',
               'recipient.required' => 'Recipient is required.'
            ]
        );
    }


    /**

    /**
     * Updating the group information.
     * @param  Request $request [description]
     * @param  [number]  $group_id 
     * @return [Json] 
     */
    public function update(Request $request,$group_id)
    {
        $validator = $this->validateRequest($request);

        if($validator->fails()){

            $this->status = false;
            $this->message = 'Please enter the valid details.';
            $this->errors = $validator->errors();
            $code = 403;

        }else{

            $this->message = 'Email Group has been updated.';
            $group_data = $request->only(['title','email','recipient']);
            $this->data = \App\Models\EmailGroup::find($group_id)->update($group_data);
            $code = 200;
        }

        return $this->response($code);
    }
    /**
     * This function uses to update the status as deleted
     * @param  Request $request [description]
     * @param  [type]  $user_id [description]
     * @return [type]           [description]
     */ 
    public function delete(Request $request,$group_id)
    {
        $this->message = 'Email Group has been deleted successfully.';
        \App\Models\EmailGroup::find($group_id)->delete();
        return $this->response();
    }
}
