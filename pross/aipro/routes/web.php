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

/*
Route::get('/', function () {
    return view('welcome');
});
*/
#Temp Login
Route::get('templogin', 'TempLoginController@login');
Route::post('templogin', 'TempLoginController@auth');
Route::group(['middleware' => '\App\Http\Middleware\TempLogin'], function () {

    Route::get('/', 'HomeController@index');
    Route::get('/whoweare', 'HomeController@WhoWeAre');
    Route::get('/whatwedo', 'HomeController@WhatWeDo');
    Route::get('/reports', 'HomeController@industryReports');
    
    Route::get('/legalpersonnel', 'HomeController@personnelAgreements');
    Route::get('/legalcommercial', 'HomeController@commercialAgreements');
    Route::get('/treaties', 'HomeController@coProductionTreaties');
    Route::get('/download/{id}', 'HomeController@Download');
    Route::get('/connect', 'HomeController@Connect');
    Route::post('/connectsave', 'HomeController@ConnectSave');

    Route::get('/allmembers', 'HomeController@allmembers');
    Route::get('/membercompany/{id}', 'HomeController@membercompany');
    Route::get('/associatemembers', 'HomeController@associatemembers');
    Route::get('/officebearer', 'HomeController@OfficeBearer');
    Route::get('/memberbearer/{id}', 'HomeController@MemberBearer');
    Route::post('/memberbearersend', 'HomeController@memberbearersendmsg');
    //Route::get('/userlogin', 'HomeController@userLogin');
    //Route::get('/userprofile', 'HomeController@userProfile');
    
});
/** Admin Login **/
Route::get('admin', 'Admin\LoginController@index');
Route::get('login', 'Admin\LoginController@index');
Route::get('admin/logout', 'Admin\LoginController@logout');
Route::post('/login','Admin\LoginController@checkLogin')->name('login');
Route::post('/resetpass','UserController@resetpassword');

/*** Admin Panel Routing **/
Route::group(['prefix' => 'admin', 'middleware' => '\App\Http\Middleware\AdminAuth'], function () {
    /** General Settings **/
    Route::get('/settings','Admin\LoginController@generalSettings');
    Route::get('/dashboard','Admin\LoginController@dashboard');
    Route::post('/update-setting','Admin\LoginController@updateSettings');
    
    /** Static Content **/
    Route::get('get-static','Admin\StaticContentController@getStatic');
    Route::resource('static','Admin\StaticContentController');
    Route::get('/download/{id}', 'Admin\StaticContentController@Download');
    
    /** Email Configuration  **/
    Route::get('get-email-template','Admin\EmailTemplateController@getEmailTemplate');
    Route::resource('email-template','Admin\EmailTemplateController');
    
    /** Contact us management **/
    Route::get('get-contact-template','Admin\ContactusTemplateController@getContactTemplate');
    Route::resource('contact-template','Admin\ContactusTemplateController');
    Route::get('/contactus-reply/{id}', 'Admin\ContactusTemplateController@reply');
    Route::post('/sendbasicemail/{id}', 'Admin\ContactusTemplateController@basic_email');
    Route::get('/Contactus/{id}', 'Admin\ContactusTemplateController@delete');

    /** Company and Member profile  **/
    Route::get('get-com-template','Admin\ComTemplateController@getComTemplate');
    Route::resource('comprofile-template','Admin\ComTemplateController');
    Route::get('/company-edit/{id}', 'Admin\ComTemplateController@editCompany');
    Route::post('/company-save/{id}', 'Admin\ComTemplateController@Companysave');
    Route::get('/member-edit/{id}', 'Admin\ComTemplateController@editMember');
    Route::post('/member-save/{id}', 'Admin\ComTemplateController@Membersave');

    /** Feature  **/
    Route::get('get-feature-template','FeatureController@getFeature');
    Route::resource('feature-template','FeatureController');
    Route::get('/feature-edit/{id}', 'FeatureController@editFeature');
    Route::post('/feature-save/{id}', 'FeatureController@Feature1save');

    /** Change Password  **/
    // Route::get('get-change-password','UserController@@getEmailTemplate');
    Route::get('adminchange-password','UserController@adminpassEdit');
    Route::post('changeadminpass','UserController@adminupdatepass');

    /** Office Bearers  **/
    Route::get('get-officeemp-template','Admin\OfficeBearerController@getofficeempTemplate');
    Route::resource('officeemp','Admin\OfficeBearerController');
    Route::get('/officeemp-edit/{id}', 'Admin\OfficeBearerController@editBearers');
    Route::post('/officeempedit-save/{id}', 'Admin\OfficeBearerController@saveBearers');
    Route::get('/officeemp-add/', 'Admin\OfficeBearerController@addBearers');
    Route::post('/officeempadd-save/', 'Admin\OfficeBearerController@addsaveBearers');
    Route::get('/DeleteBearer/{id}', 'Admin\OfficeBearerController@delete');

});

/*** User Panel Routing **/
Route::group(['prefix' => 'user', 'middleware' => '\App\Http\Middleware\UserAuth'], function () {
   
    Route::resource('userprofile','UserController',['except'=>'show']);
    
    Route::get('profileedit','UserController@userProfileEdit');
    Route::post('profilesave','UserController@userProfileEditSave');
    Route::post('comprofilesave','UserController@empProfileEditSave');
    Route::post('composterpicsave','UserController@empPosterProfilePicSave');
    Route::post('pubsave','UserController@pubSave');
    Route::get('inssave','UserController@insSave');
    Route::get('passEdit','UserController@userpassEdit');
    Route::post('changepass','UserController@userupdatepass');

    Route::get('featureedit','FeatureController@featureEdit');
    Route::post('featuresave','FeatureController@featureSave');
    Route::get('feature1','FeatureController@getFeatureFirst');
    Route::get('feature2','FeatureController@getFeatureSecond');
    Route::get('feature3','FeatureController@getFeatureThird');
    // Route::post('publishsave','FeatureController@publishSave');
    
});