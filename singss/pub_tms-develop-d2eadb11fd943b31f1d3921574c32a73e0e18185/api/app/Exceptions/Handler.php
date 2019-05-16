<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Debug\Exception\FlattenException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
       return  parent::render($request,$e);

        $error_code = 500;
        $message = class_basename( $e ).' in '.basename($e->getFile()).' line '.$e->getLine().': ' .$e->getMessage();

        if ($e instanceof HttpResponseException) {
            return $e->getResponse();
        } elseif ($e instanceof ModelNotFoundException) {
           
           $message = $e->getMessage();
           $error_code = 404;

        } elseif ($e instanceof NotFoundHttpException) {
           
           $message = "Page Not Found.";
           $error_code = 404;

        } elseif ($e instanceof AuthorizationException) {

           $message = $e->getMessage();
           $error_code = 403;

        }elseif ($e instanceof MethodNotAllowedHttpException) {

           $error_code = 405;

        } elseif ($e instanceof ValidationException && $e->getResponse()) {
            return $e->getResponse();

        }elseif($e instanceof FlattenException || $e instanceof FatalThrowableError){

            $error_code = 500;
        }

        $data = [
            'message'=>$message,
            'status'=>false,
            'error_code'=>$error_code,
            'errors'=>[],
            'data'=>[],
        ];

        return response()->json($data, $error_code);
    }
    
}
