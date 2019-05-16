<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $message = '';
    protected $status= true;
    protected $error_code ='';
    protected $errors =[];
    protected $data= [];

    /**
     * This function uses for sending to the client.
     * @param  integer $code [status code]
     * @return \Illuminate\Http\Response
     */
    protected function response($code=200)
    {
    	$data = [
  			'message'=>$this->message,
  			'status'=>$this->status,
  			'error_code'=>$this->error_code,
  			'errors'=>$this->errors,
  			'data'=>$this->data,
    	];

    	return response()->json($data, $code);
    }
   
}
