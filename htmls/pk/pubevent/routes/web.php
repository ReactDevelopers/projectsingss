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

// use Illuminate\Support\Facades\Config;
// use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;

$router->get('/key', function() {
    ///return str_random(32);
    //return Arr::has([], 'new_values.role_id');
    //echo '<pre>';
    //print_r(\App\Models\Audit::all()->toArray());
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->options(
    '/{any:.*}', 
    [
        'middleware' => ['cros'], 
        function (){ 
            return response(['status' => 'success']); 
        }
    ]
);
$router->group(['middleware' => ['cros']], function () use ($router) {
    $router->post('/login-action','AuthController@loginAction');
});

$router->get('/logout','ProfileController@logout');
$router->get('phpinfo', function () {
    return phpinfo();
});


$router->group(['middleware' => ['cros','auth:api']], function () use ($router) {

    $router->get('/me','ProfileController@myProfile');    

	/**
	 * User Section Route for [list, get, update and delete]
	 */
	$router->get('user',['uses'=>'UsersController@index', 'middleware'=>'canAccess:user-list[Admin]']);
	$router->get('user/{id}',['uses'=>'UsersController@get', 'middleware'=>'canAccess:user-info[User]']);
	$router->put('user/{id}',['uses'=>'UsersController@update', 'middleware'=>'canAccess:user-update[User]']);
	$router->delete('user/{id}',['uses'=>'UsersController@delete', 'middleware'=>'canAccess:user-delete[Admin]']);
    $router->get('role',['uses'=>'UsersController@roles', 'middleware'=>'canAccess:roles[Admin]']);

	/**
     * Event Management - Create, Edit, Delete and List
     */
    $router->post('event',['uses'=>'EventController@store', 'middleware'=>'canAccess:event-create[Admin]']);
    $router->get('event',['uses'=>'EventController@index', 'middleware'=>'canAccess:event-list[User]']);
    $router->delete('event/{id}',['uses'=>'EventController@delete', 'middleware'=>'canAccess:event-delete[Admin]']);
    $router->get('event/{id}',['uses'=>'EventController@get', 'middleware'=>'canAccess:event-info[User]']);
    $router->put('event/{id}',['uses'=>'EventController@update', 'middleware'=>'canAccess:event-update[Admin]']);

    $router->get('event-years',['uses'=>'EventController@getEventYear','middleware'=>'canAccess:event-years[Admin]']);

    /**
    * Event Group Management - Create, Edit, Delete
    */
    $router->get('group',['uses'=>'EventGroupController@index', 'middleware'=>'canAccess:event-group-list[Admin]']);
    $router->post('group',['uses'=>'EventGroupController@store', 'middleware'=>'canAccess:event-group-create[Admin]']);
    $router->delete('group/{id}',['uses'=>'EventGroupController@delete', 'middleware'=>'canAccess:event-group-delete[Admin]']);
    $router->get('group/{id}',['uses'=>'EventGroupController@get', 'middleware'=>'canAccess:event-group-info[Admin]']);
    $router->put('group/{id}',['uses'=>'EventGroupController@update', 'middleware'=>'canAccess:event-group-update[Admin]']);
    $router->get('group/event/list',['uses'=>'EventGroupController@eventlist', 'middleware'=>'canAccess:group-list[Admin]']);

    /**
     * Email Template Routes
     */
    $router->get('email-template/{id}',['uses'=>'EmailController@get', 'middleware'=>'canAccess:email-template-info[Admin]']);
    $router->put('email-template/{id}',['uses'=>'EmailController@update', 'middleware'=>'canAccess:email-template-update[Admin]']);

    /**
    * Send notification
    */
    $router->get('template',['uses'=>'EventController@getTemplate', 'middleware'=>'canAccess:template-info[Admin]']);
    $router->post('send/mail',['uses'=>'EventController@sendNotification', 'middleware'=>'canAccess:send-mail[Admin]']);

    //Audit Trail Route
    $router->get('audit-trail',['uses' => 'AuditController@index']);

});


$router->get('run_seed', function() {

    return Artisan::call('db:seed');
});

$router->get('migrate', function() {

    return Artisan::call('migrate');
});

$router->get('tttt', function (){

    return file_get_contents('/var/www/html/pub-eventstg/ldapMessage.txt');
});