<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
#Temp Login
Route::get('templogin', 'TempLoginController@login');
Route::post('templogin', 'TempLoginController@auth');

Route::group(['middleware' => '\App\Http\Middleware\TempLogin'], function () {
	Route::get('/', 'admin\LoginController@frontuser');
});	


//route for admin dashboard login
Route::get('admin','admin\LoginController@index');
Route::get('login','admin\LoginController@index');
Route::post('/home', 'admin\LoginController@checklogin');

//admin dashboard
Route::group(['middleware' => '\App\Http\Middleware\AdminAuth'], function(){
Route::get('admin/dashboard','admin\LoginController@dashboard');
Route::get('/settings','admin\LoginController@generalSettings');
// Route::get('login1','admin\LoginController@index');
// Email Configuration  
Route::get('get-email-template','admin\EmailTemplateController@getEmailTemplate');
Route::resource('email-template','admin\EmailTemplateController');

});

//logout
Route::get('logout', 'admin\LoginController@logout');






