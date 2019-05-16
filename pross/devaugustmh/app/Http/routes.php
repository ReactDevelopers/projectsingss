<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



#Temp Login
Route::get('templogin', 'TempLoginController@login');
Route::post('templogin', 'TempLoginController@auth');


Route::group(['middleware' => '\App\Http\Middleware\TempLogin'], function () {
});	
	Route::get('/', 'HomeController@index');
	Route::post('addcontact', 'HomeController@addcontact');
	Route::post('subscribe', 'HomeController@addSubscribe');
	Route::get('loadmore', 'HomeController@newsLoadMore');
	


/** Admin Login **/

/** Admin Login **/
Route::get('admin', 'Admin\LoginController@index');
Route::get('login', 'Admin\LoginController@index');
Route::get('admin/logout', 'Admin\LoginController@logout');
Route::post('/login','Admin\LoginController@checkLogin')->name('login');



/*** Admin Panel Routing **/
Route::group(['middleware' => '\App\Http\Middleware\AdminAuth'], function () {
	
		/** General Settings **/
		Route::get('/settings','Admin\LoginController@generalSettings');
		Route::get('admin/dashboard','Admin\LoginController@dashboard');
		Route::post('/update-setting','Admin\LoginController@updateSettings');
        
        
        /** Contact Us  **/
		Route::get('get-contact','Admin\ContactUsController@getContact');
		Route::get('/contactus/delete/{param}','Admin\ContactUsController@delete');
		Route::resource('contactus','Admin\ContactUsController');
	/** Subscribers Us  **/ 
		Route::get('get-subscribers','Admin\SubscribersController@getSubscribers');
		Route::get('/subscribers/delete/{param}','Admin\SubscribersController@delete');
		Route::resource('subscribers','Admin\SubscribersController');
	
	/** Email Configuration  **/
		Route::get('get-email-template','Admin\EmailTemplateController@getEmailTemplate');
		Route::resource('email-template','Admin\EmailTemplateController');
		
	/** Research Type  **/
		Route::get('get-news','Admin\NewsController@getNews');
		Route::get('/news/delete/{param}','Admin\NewsController@delete');
		Route::resource('news','Admin\NewsController');
	/** Team Type  **/
		Route::get('get-team','Admin\TeamController@getNews');
		Route::get('/team/delete/{param}','Admin\TeamController@delete');
		Route::resource('team','Admin\TeamController');
	/** Project Type  **/
		Route::get('get-projects','Admin\ProjectsController@getProjects');
		Route::get('/projects/delete/{param}','Admin\ProjectsController@delete');
		Route::resource('projects','Admin\ProjectsController');

/** What do We Do  **/
		Route::get('get-whatdowedo','Admin\WhatdowedoController@getWhatDoWeDo');
		Route::get('/whatdowedo/delete/{param}','Admin\WhatdowedoController@delete');
		Route::resource('whatdowedo','Admin\WhatdowedoController');
		
/** Banners  **/
		Route::get('get-banners','Admin\BannersController@getBanners');
		Route::get('/banners/delete/{param}','Admin\BannersController@delete');
		Route::resource('banners','Admin\BannersController');
		
});