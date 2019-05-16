<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller {

    /**
     * Getting Departments list from the database.
     * @param  Request $request [description]
     * @return Instance of Response
     */
    public function index(Request $request)
    {
        $departments = \App\Models\Department::select('name','id');
        

        if($request->sizePerPage == -1){

           $departments = $departments->get();

        }else{

            $departments = $departments->paginate($request->sizePerPage);
        }

        $this->data = $departments;
        return $this->response();
    }
    

}
