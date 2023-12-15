<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
//Frontend Controllers
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SslCommerzPaymentController;
//Backend Controllers
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\LogoutController;

/*
  |--------------------------------------------------------------------------
  | Front-End Web Routes
  |--------------------------------------------------------------------------
  |
 */
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/about-us', 'aboutus');
    Route::get('/classes', 'classes');
    Route::get('/schedules', 'schedules');
    Route::get('/trainers', 'trainers');
    Route::get('/packages', 'packages');
    Route::get('/contact-us', 'contactus');

    Route::get('/gym-class/{value}', 'gym_class');
    Route::get('/view-trainer-info', 'view_trainer_info');

    Route::get('/check_duplicate_mailaddress', 'check_duplicate_mailaddress');
    Route::get('/check_duplicate_username', 'check_duplicate_username');
    Route::get('/registration', 'registration');
    Route::get('/onlinepayment', 'onlinepayment');
    Route::get('/paymentstatus', 'paymentstatus');
    Route::get('/saveregistration', 'saveregistration');
    Route::post('/newregistration', 'newregistration')->name('newregistration');
    Route::post('/getappointment', 'getappointment')->name('getappointment');
    Route::get('/check_exist_emailaddress', 'check_exist_emailaddress');
    Route::get('/former-member', 'exmembers');
    Route::get('/former-member-review', 'exmember_review');
    Route::get('/galleries', 'galleries');
    Route::get('/view-class-schedule/{id}', 'view_class_schedule');

});
// SSLCOMMERZ Start
Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
/*
  |--------------------------------------------------------------------------
  | Backend Web Routes Start
  |--------------------------------------------------------------------------
  |
 */
Route::controller(LoginController::class)->group(function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get('/login', 'login');
    });
    Route::post('/usersaccess', 'usersaccess')->name('usersaccess');
});

Route::group(['middleware' => ['preventbackhistory', 'auth', 'verified']], function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/authorization', 'index');
    });
});

Route::group(['middleware' => ['preventbackhistory', 'adminauth', 'verified']], function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin', 'index');
        Route::get('/homebanner', 'homebanner');
        Route::post('/save_home_banner', 'save_home_banner')->name('save_home_banner');
        Route::get('/change_home_banner_status', 'change_home_banner_status');
        Route::get('/delete_home_banner/{id}', 'delete_home_banner');

        Route::get('/aboutus', 'aboutus');
        Route::post('/update_aboutus', 'update_aboutus')->name('update_aboutus');
        Route::get('/gymclass', 'gymclass');
        Route::post('/saveclass', 'saveclass')->name('saveclass');
        Route::get('/edit_class_data', 'edit_class_data');
        Route::post('/updateclass', 'updateclass')->name('updateclass');
        Route::get('/delete_class_data/{id}', 'delete_class_data');

        Route::get('/gymtraniners', 'gymtraniners');
        Route::get('/edit_trainer_info', 'edit_trainer_info');
        Route::post('/savetraniner', 'savetraniner')->name('savetraniner');
        Route::post('/updatetraniner', 'updatetraniner')->name('updatetraniner');

        Route::get('/gympackages', 'gympackages');
        Route::get('/change_membership_package', 'change_membership_package');
        Route::get('/change_membership_trainer', 'change_membership_trainer');
        Route::post('/saveupdate_package', 'saveupdate_package')->name('saveupdate_package');
        Route::post('/update_member_package', 'update_member_package')->name('update_member_package');
        Route::post('/update_member_trainer', 'update_member_trainer')->name('update_member_trainer');

        Route::get('/customerlist', 'customerlist');
        Route::get('/view_membership_details', 'view_membership_details');

        Route::get('/viewcustomerinfo', 'viewcustomerinfo');
        Route::get('/reapprovedmember', 'reapprovedmember');
        Route::get('/exgymmemberstatus', 'exgymmemberstatus');
        Route::get('/assignschedule', 'assignschedule');
        Route::get('/member_gym_payments', 'member_gym_payments');
        Route::get('/delete_member_access/{value}', 'delete_member_access');
        Route::post('/gym_payment_update', 'gym_payment_update')->name('gym_payment_update');

        Route::get('/members_log_history', 'members_log_history');

        Route::get('/weight_gain_loss', 'weight_gain_loss');
        Route::get('/delete_weight_gain_loss', 'delete_weight_gain_loss');
        Route::post('/update_weight_gain_loss', 'update_weight_gain_loss')->name('update_weight_gain_loss');

        Route::get('/allappointment', 'allappointment');
        Route::get('/view_new_appointment_info', 'view_new_appointment_info');
        Route::post('/feedbackmessage', 'feedbackmessage')->name('feedbackmessage');

        //members_users
        Route::get('/useraccess', 'useraccess');
        Route::get('/check_duplicate_user', 'check_duplicate_user');
        Route::post('/save_user_access', 'save_user_access')->name('save_user_access');
        Route::get('/manage_member_access/{id}/{value}', 'manage_member_access');
        Route::post('/update_user_access', 'update_user_access')->name('update_user_access');
        Route::get('/delete_user_access/{id}', 'delete_user_access');

        //Diet Plan Chart
        Route::get('/diet_plan_chart', 'diet_plan_chart');
        Route::post('/save_dietplan', 'save_dietplan')->name('save_dietplan');
        Route::get('/edit_diet_plan_chart/{id}', 'edit_diet_plan_chart');
        Route::get('/delete_diet_plan_chart/{id}', 'delete_diet_plan_chart');
        Route::post('/update_dietplan', 'update_dietplan')->name('update_dietplan');
        
        //Manage Gallery
        Route::get('/manage_galleries', 'manage_galleries');
        Route::post('/save_home_gallery', 'save_home_gallery')->name('save_home_gallery');
        Route::get('/change_home_gallery_status', 'change_home_gallery_status');
        Route::get('/edit_gallery_info/{id}', 'edit_gallery_info');
        Route::post('/update_home_gallery', 'update_home_gallery')->name('update_home_gallery');
        Route::get('/delete_home_gallery_image/{id}', 'delete_home_gallery_image');
    });
    Route::controller(SettingController::class)->group(function () {
        Route::get('/presetdata/{value}', 'presetdata');
        Route::get('/delete_setting_data', 'delete_setting_data');
        Route::get('/get_single_presetdata', 'get_single_presetdata');
        Route::post('/saveupdate_presetdata', 'saveupdate_presetdata')->name('saveupdate_presetdata');
        Route::get('/system_email', 'system_email');
        Route::post('/update_system_email', 'update_system_email')->name('update_system_email');
        Route::get('/trainer_post', 'trainer_post');
        Route::get('/gymschedules', 'schedules');
        Route::get('/get_schedule_data', 'get_schedule_data');
        Route::post('/makeschedule', 'makeschedule')->name('makeschedule');
        Route::post('/updateschedule', 'updateschedule')->name('updateschedule');
    });
});

Route::group(['middleware' => ['preventbackhistory', 'commonauth', 'verified']], function () {
    Route::controller(MemberController::class)->group(function () {
        Route::get('/member', 'index');
        Route::get('/gymprofile', 'gymprofile');
        Route::post('/updatephoto', 'updatephoto')->name('updatephoto');
        Route::post('/updatesettingdata', 'updatesettingdata')->name('updatesettingdata');
        Route::post('/updateprofiledata', 'updateprofiledata')->name('updateprofiledata');
        Route::get('/gymclasses', 'gymclasses');
        Route::get('/gymschedule', 'gymschedule');
        Route::get('/gymtrainers', 'gymtrainers');
        Route::get('/member_packages', 'member_packages');
        Route::get('/view_package_equipments', 'view_package_equipments');
        Route::post('/package_update_request', 'package_update_request')->name('package_update_request');
        Route::get('/member_gym_trainers', 'member_gym_trainers');
        Route::post('/trainer_update_request', 'trainer_update_request')->name('trainer_update_request');
        Route::get('/member_weight_gain_loss', 'member_weight_gain_loss');
        Route::get('/gympaymentstatus', 'gympaymentstatus');
        Route::get('/gymessagebox', 'gymessagebox');
        Route::get('/gymmemschedule', 'gymmemschedule');
        Route::get('/member_diet_plan_chart', 'member_diet_plan_chart');
        Route::post('/send_schedule_request', 'send_schedule_request')->name('send_schedule_request');
        Route::get('/add_start_daily_workout', 'add_start_daily_workout');
        Route::post('/save_daily_workout', 'save_daily_workout')->name('save_daily_workout');
        Route::get('/close_start_daily_workout', 'close_start_daily_workout');
        Route::post('/update_daily_workout', 'update_daily_workout')->name('update_daily_workout');
        //add_daily_workout
        Route::get('/add_daily_workout', 'add_daily_workout');
        Route::post('/update_missing_workout', 'update_missing_workout')->name('update_missing_workout');
        //Review Corner
        Route::get('/reviewcorner', 'reviewcorner');
        Route::post('/member_review_corner', 'member_review_corner')->name('member_review_corner');
    });
});

Route::group(['middleware' => ['preventbackhistory', 'commonauth', 'verified']], function () {
    Route::controller(NotificationController::class)->group(function () {
        Route::get('/getallnotification', 'getallnotification');
        Route::get('/viewallnotifications', 'viewallnotifications');
        Route::get('/view_new_registration_info', 'view_new_registration_info');
        Route::post('/addtocustomerlist', 'addtocustomerlist')->name('addtocustomerlist');
        Route::post('/cancelcustomerlist', 'cancelcustomerlist')->name('cancelcustomerlist');
        Route::get('/check_duplicate_usernamer', 'check_duplicate_usernamer');
        Route::get('/add_new_schedule_request', 'add_new_schedule_request');
        Route::post('/approve_member_schedule', 'approve_member_schedule')->name('approve_member_schedule');
    });
});

Route::get('/logout', [LogoutController::class, 'logout']);

/*
 * *************************** Cache Clean Route **************************
 */

Route::get('/qstart', function () {
//    Artisan::call('queue:work');
//    return redirect('/');
});

Route::get('/clearcache', function () {
    $cacheCommands = array(
        'event:clear',
        'view:clear',
        'cache:clear',
        'route:clear',
        'config:clear',
        'clear-compiled',
        'optimize:clear'
    );
    foreach ($cacheCommands as $command) {
        Artisan::call($command);
    }
    $notification = array(
        'message' => 'Cache cleared successfully',
        'alerttype' => 'success'
    );
    return redirect('/')->with($notification);
});
