<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function response($status= 200) {

        return app('Lq\Response')->out($status);
    }

    public function setData($data) {

        app('Lq\Response')->data = $data;
        return $this;
    }
    public function setErrors($errors) {

        app('Lq\Response')->errors = $errors;
        return $this;
    }
    public function setError($error) {

        app('Lq\Response')->error = $error;
        return $this;
    }
    public function setErrorCode($error_code) {

        app('Lq\Response')->error_code = $error_code;
        return $this;
    }
    public function setMessage($message) {

        app('Lq\Response')->message = $message;
        return $this;
    }
}
