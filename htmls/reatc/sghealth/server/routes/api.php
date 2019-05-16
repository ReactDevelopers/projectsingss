<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::options('{any:.*}', function () {

    return response()->json(['status' => true]);
});

Route::get('/', function () {
    echo exec('sudo whoami');
});

/**
 * Country code and more public route
 */
Route::get('calling-code', 'Api\UniversalController@callingCode');
Route::get('site-general-config', 'Api\UniversalController@siteConfigurations');

Route::namespace('Api\Sections')->group(function () {
    /**
     * Auth routes
     */
    Route::namespace('Auth')->group(function() {

        Route::post('login', 'LoginController@login')->name('login');
        Route::post('forget-password', 'FogetPasswordController@sendResetLink')->name('forget-password');
        Route::post('reset-password', 'ResetPasswordController@resetPassword')->name('reset-password');
        Route::post('refresh-token', 'LoginController@refreshToken')->name('refresh-token');
        Route::post('data-verification-token', 'DataVerificationController@sendToken')->name('generate-verification-token');
        Route::post('data-verify', 'DataVerificationController@verifyData')->name('verified-delete-token');
        Route::post('otp-verify', 'DataVerificationController@verifyOtp')->name('verified-otp');
        Route::post('register', 'RegisterController@register')->name('register');
    });


    /**
     * My Profile Routes.
     */
    Route::namespace('MyProfile')->group(function () {

        Route::post('logout', 'MyProfileController@logout')->name('logout');
        Route::put('update-device-info', 'MyProfileController@updateDeviceInfo')->name('device.update');
        Route::put('update-device-setting', 'MyProfileController@updateMyDeviceSettings')->name('device.update_setting');
        Route::get('/my-profile', 'MyProfileController@myProfile')->name('my-profile');
        Route::put('/my-profile', 'MyProfileController@update')->name('my-profile.update');
        Route::put('/my-profile/reset-password', 'MyProfileController@resetPassword')->name('my-profile.reset-password');
    });


    /***
     * Dashboard Routes
     */
    Route::get('dashboard', 'Dashboard\DashboardController@index')->name('dashboard');

    /**
     * users Routes
     */
    Route::put('users/{id}/add-additional-info', 'Users\UserController@addAdditionalInformation')->name('users.addAdditionalInformation', null);
    Route::post('users/{id}/send-push-notification', 'Users\UserController@sendPushNotification')->name('users.sendpushnotification', null);
    Route::apiResource('users', 'Users\UserController')->except(['store'])->name('users', null);
    Route::post('reset-password/{id}', 'Users\UserController@resetPassword')->name('users.reset-password', null);
    Route::post('restore-user/{id}', 'Users\UserController@restore')->name('users.restore', null);
    Route::post('create-employee', 'Users\UserCreateController@storeEmpolyee')->name('create-employee', null);
    Route::post('create-manager', 'Users\UserCreateController@storeManager')->name('create-manager', null);
    Route::post('create-event-manager', 'Users\UserCreateController@storeEventManager')->name('create-event-manager', null);
    Route::post('create-freelancer', 'Users\UserCreateController@storeEmpolyee')->name('create-freelancer', null);


    /**
     * Profession Routes
     */
    Route::apiResource('profession', 'Profession\ProfessionController')->name('profession', null);
    Route::post('restore-profession/{id}', 'Profession\ProfessionController@restore')->name('restore-profession', null);
    /**
     * Profession Category Routes
     */
    Route::apiResource('profession-category', 'ProfessionCategory\ProfessionCategoryController')->name('profession-category', null);
    Route::post('restore-profession-category/{id}', 'ProfessionCategory\ProfessionCategoryController@restore')->name('restore-profession-category', null);
    /**
     * Branch Routes
     */
    Route::apiResource('branch', 'Branch\BranchController')->name('branch', null);
    /**
     * Institute Routes
     */

    Route::get('institute/{id}/employees', 'Institute\InstituteController@getInstituteAllEmployee')->name('institute-employee-list', null);
    Route::apiResource('institute', 'Institute\InstituteController')->name('institute','institute');
    Route::post('restore-institute/{id}', 'Institute\InstituteController@restore')->name('restore-institute', null);

    /**
     * Institute category route
     */
    Route::apiResource('institute-category', 'InstituteCategory\InstituteCategoryController')->name('institute-category', null);
    Route::apiResource('institute-license', 'Institute\InstituteLicenseController')->except(['show'])->name('institute-license', null);
    Route::post('restore-institute-category/{id}', 'InstituteCategory\InstituteCategoryController@restore')->name('restore-institute-category', null);

    /**
     * License Route
     */

     Route::apiResource('license', 'License\LicenseController')->name('license', null);
    /**
     * Service routes
     */
    Route::apiResource('service', 'Service\ServicesController')->name('service', null);
    Route::post('restore-service/{id}', 'Service\ServicesController@restore')->name('restore-service', null);

    /**
     * Service routes
     */
    Route::apiResource('config', 'Config\ConfigController')->only(['index', 'update', 'show', 'destroy'])->name('config', null);

    /**
     * certificate routes
     */
    Route::apiResource('certificate', 'Certificate\CertificateController')->name('certificate', null);
    Route::post('restore-certificate/{id}', 'Certificate\CertificateController@restore')->name('restore-certificate', null);

    /**
     * Notification template routes
     */
    Route::apiResource('notification-template', 'Notification\NotificationTemplateController')->name('notification-template', null);

    /**
     * Banner Routes
     */
    Route::get('banner/splash-screen', 'Banner\BannerController@randomSplashBanner')->name('banner.splash-screen');
    Route::apiResource('banner', 'Banner\BannerController')->name('banner', null);

    /**
     * Banner Category Route
     */
    Route::apiResource('banner-category', 'BannerCategory\BannerCategoryController')->name('banner-category', null);

     /**
     * Faq Route
     */
    Route::apiResource('faq', 'Faq\FaqController')->name('faq', null);

     /**
     * Post Route
     */
    Route::apiResource('post', 'Post\PostController')->name('post', null);
    Route::post('restore-post/{id}', 'Post\PostController@restore')->name('restore-post', null);

    /**
     * Post Type Route
     */
    Route::apiResource('post-type', 'Post\PostTypeController')->only(['index'])->name('post-type', null);

     /**
     * User Certificate Route
     */
    Route::get('my-certificate', 'Users\UserCertificateController@myCertificate')->name('my-certificate', null);
    Route::apiResource('user-certificate', 'Users\UserCertificateController')->except(['show'])->name('user-certificate', null);
    Route::post('user-certificate/re-arrange', 'Users\UserCertificateController@reArrangeCertificate')->name('user-certificate.re-arrange', null);

    /**
     * User Certificate Route
     */
    Route::apiResource('contact-us', 'Contact\ContactUsController')->except(['destroy'])->name('contact-us', null);


    /**
     * Event Action Routes
     */
    Route::post('event/register', 'EventAction\EventActionController@eventRegister')->name('event-register');
    Route::post('event/mark-attendance', 'EventAction\EventActionController@markAttendance')->name('event.mark-attendance');
    Route::get('event/{id}/member', 'EventAction\EventMemberController@index')->name('event-list-member');
    Route::post('event-member/{id}', 'EventAction\EventActionController@changeStatus')->name('event-member-change-status');
    Route::post('event-winner', 'EventAction\EventActionController@createWinner')->name('event-winner');

    /**
     * Event Route
     */
    Route::apiResource('event', 'Event\EventController')->name('event', null);


 /**
    * Assignment
    */
    Route::apiResource('assignment','Assignment\AssignmentController')->name('assignment',null);

   /**
    * AssignmentApplication
    */
    Route::apiResource('assignment-application','Assignment\AssignmentApplicationController')->name('application',null);

    /**
    * News
    */
    Route::apiResource('news','News\NewsController')->name('news',null);

    /**
    * Advertisment
    */
    Route::apiResource('advertisment','Advertisment\AdvertismentController')->name('advertisment',null);

    /**
     * Oauth Client Route.
     */
    Route::apiResource('oauth-client', 'OauthClientController')->only([
        'index', 'show'
    ])->name('oauth-client', null);

    Route::get('device/user', 'DeviceController@deviceLoginUser')->name('device-login-users');
    Route::put('device/user/{id}/revoke', 'DeviceController@revokedDeviceUser')->name('device-user-revoke');

    Route::apiResource('device', 'DeviceController')->only([
        'index', 'show'
    ])->name('device', null);

    /**
     * Permission Routes
     */
    Route::post('permission/upload', 'Permission\PermissionController@upload')->name('permission.upload');
    Route::apiResource('permission', 'Permission\PermissionController')->name('permission', null);
    Route::apiResource('permission-group', 'PermissionGroup\PermissionGroupController')->only(['index'])->name('permission-group', null);
    Route::apiResource('role', 'Role\RoleController')->only(['index', 'show', 'update'])->name('role', null);
    Route::apiResource('media', 'Media\MediaController')->only(['store'])->name('media', null);

    /**
     * Roster route
     */
    Route::post('roster/auto-schedule', 'Roster\RosterActionController@createAutoSchedule')->name('roster-create-auto-schedule');
    Route::delete('roster/auto-schedule/{id}', 'Roster\RosterActionController@deleteAutoSchedule')->name('roster-delete-auto-schedule');
    Route::post('roster/day-comment', 'Roster\RosterActionController@createScheduledDayComment')->name('roster-create-day-comments');
    Route::get('roster/day-comment', 'Roster\RosterActionController@getMonthScheduledInfomation')->name('roster-get-day-comments');
    Route::get('roster/auto-schedule', 'Roster\RosterActionController@getAutoScheduleList')->name('roster-get-auto-schedule');
    Route::get('roster/my', 'Roster\RosterController@myRoster')->name('my-roster');
    Route::apiResource('roster', 'Roster\RosterController')->except(['update', 'show'])->name('roster', null);


    /***
     * Roster Plan Route
     */
    Route::apiResource('roster-plan', 'Roster\RosterPlanController')->only(['index','store', 'destroy'])->name('roster-plan',null);
    /***
     * schedule routes
     */
    Route::apiResource('institute-monthly-data','Institute\InstituteMonthlyScheduleController')->only(['index', 'store']);

    /**
     * Create Manager
     */
    Route::post('register-event-manager', 'Event\CreateManagerController@registerManager')->name('register-event-manager');


    /**
     * developer route
     */
    Route::group(['prefix' => 'developer', 'namespace' => 'Developer'], function () {

        Route::post('execute-php', 'DeveloperController@executePhpCommand')->name('execute-php');
        Route::post('execute-node', 'DeveloperController@executeNodeCommand')->name('execute-node');
        Route::post('execute-composer', 'DeveloperController@executeComposerCommand')->name('execute-composer');
        Route::get('request-log', 'RequestLogController@index')->name('request-log');
    });

    /**
     * Cpd Routes
     */
    Route::get('my-cpd', 'Cpd\CpdController@myCpd')->name('my-cpd');
    Route::get('cpd-export/{id}', 'Cpd\CpdController@exportCpd')->name('cpd-export');
    Route::apiResource('cpd', 'Cpd\CpdController')->only(['index', 'store', 'update', 'destroy'])->name('cpd', null);
});

Route::namespace('Api\Front')->group(function () {
    /**
     * Static Page Urls
     */
    Route::get('static-page-url', 'StaticPageController@staticPageUrl')->name('static-page-url', null);
    Route::get('static-page/{slug}','StaticPageController@index');
});
