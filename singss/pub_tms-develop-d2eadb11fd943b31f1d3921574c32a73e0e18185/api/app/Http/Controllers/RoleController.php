<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller {

    /**
     * Getting Role list from the database.
     * @param  Request $request [description]
     * @return Instance of Response
     */
    public function index(Request $request)
    {
        $roles = \App\Models\Role::select('title as name','id');
        

        if($request->sizePerPage == -1){

           $roles = $roles->get();

        }else{

            $roles = $roles->paginate($request->sizePerPage);
        }

        $this->data = $roles;
        return $this->response();
    }
    

}
