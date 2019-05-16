<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    
    /**
     * Getting Audit trail list from the database.
     * @param  Request $request [description]
     * @return Instance of Response
     */
    public function index(Request $request)
    {

        $audits = \App\Models\Audit::join('users','users.id' ,'=','audits.user_id')
            ->select('audits.*','users.name as user_name','users.email as user_email');

        if ($request->has('sortName')) {

            switch ($request->sortName) {
                case 'created_at':
                    $audits->orderBy('audits.created_at',$request->sortOrder);
                    break;         
                
                default:
                    $audits->orderBy('audits.created_at', 'DESC');
                    break;
            }
        } else {

            $audits->orderBy('audits.created_at', 'DESC');
        }

        $this->data = $audits->paginate($this->sizePerPage);
        return $this->response();

    }
}
