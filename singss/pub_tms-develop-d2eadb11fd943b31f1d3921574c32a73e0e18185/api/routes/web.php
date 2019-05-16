<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/key', function() {
    return str_random(32);
});

$router->get('/build-dev', function() {

    $path = base_path().'/../client';

    echo system("cd {$path} && npm run web-build-develop");
});

$router->get('/', function () use ($router) {
	//  $data = \DB::connection('mysql_old')->table('department')->select([
 //        	'OrgUnit as name',
 //        	'OrgUnitCode as oganization_code',
 //    		\DB::raw('IF(DeletedStatus =0,null, CURRENT_DATE() ) as deleted_at'),
 //    		'AddedDate as created_at',
 //    		'LastUpdatedDate as updated_at'
 //    	])->get();

	// dd($data->toArray()[0]);
///''
	return app('hash')->make(12345678);
    return $router->app->version();
});

$router->post('/login-action','AuthController@loginAction');

$router->group(['middleware' => [\App\Http\Middleware\CorsMiddleware::class,'auth']], function () use ($router) {

	$router->post('/my-profile','ProfileController@myProfile');
	$router->post('/logout','ProfileController@logout');

	/**
	 * User Section Route for [list, get, update and upload]
	 */
	$router->post('user/list','UsersController@index');
	$router->post('user/{id}/edit','UsersController@get');
	$router->put('user/{id}','UsersController@update');
	$router->delete('user/{id}','UsersController@delete');
    $router->post('user/import','UsersController@upload');
    
    /**
     * Course section route for [list, get, update and create]
     */
    $router->post('course','CourseController@store');
    $router->post('course/list','CourseController@index');
    $router->delete('course/{id}','CourseController@delete');
    $router->post('course/{id}/edit','CourseController@get');
    $router->put('course/{id}','CourseController@update');


    /**
     * Running courses Section routes
     */
    
    $router->post('running-course/list','RunningCourseController@index');
    $router->delete('running-course/{id}','RunningCourseController@delete');
    $router->post('course-of-category','RunningCourseController@getCourseByCategory');
    $router->post('running-course','RunningCourseController@store');


    $router->post('running-course-booking/list','RunningCourseBookingController@index');

    //$router->post('department','DepartmentController@index');
    //$router->post('role','RoleController@index');
});
