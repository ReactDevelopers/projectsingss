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

use Illuminate\Http\Request;


Route::get('cache-clear', function () {

    return \Artisan::call('cache:clear');
});

Route::get('auth/{any?}/{any1?}/{any2?}/{any3?}/{any4?}/{any5?}/{any6?}/{any7?}', function (){

    return view('auth/index');
});

Route::get('admin/{any?}/{any1?}/{any2?}/{any3?}/{any4?}/{any5?}/{any6?}/{any7?}', function (Request $request){
    return view('admin/index');
});

Route::get('static-page/{slug}','Api\Front\StaticPageController@index');

Route::get('certificate-expiry', function () {

    return \Artisan::call('certificate:expiry');
});


/**
    Marketing Site Routes
**/
Route::resource('/','Front\HomeController');
Route::get('{slug}','Front\AboutusController@index')->where('slug','about-us|privacy-policy|terms-and-conditions');
Route::resource('faq','Front\FaqController');
Route::resource('contact-us','Front\ContactController');


Route::get('test',function(){
    $data['data'] = \App\Models\Cpd::with(['document'])->where('cpd.user_id',48)->get()->toArray();
    return view('pdf.cpd_pdf')->with($data);
});