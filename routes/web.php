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

use Chencha\Share\Share;

Auth::routes();


Route::get('/',   'HomeController@index')->name('index');
Route::get('/share', function()
{
    return Share::load('http://www.example.com', 'My example')->facebook();
})->name('share');
Route::post('/','HomeController@subscribe')->name('subscribe');
Route::get('/post_advertisement',   'PostAdvertisementController@index')->name('view_post_ad');
Route::get('/sub','PostAdvertisementController@getSub')->name('sub');
Route::post('/post_advertisement', 'PostAdvertisementController@store')->name('post_ad');
Route::get('/ad/{category_slug}/{slug}', 'SingleAdvertisementController@show')->name('add');
Route::get('/list/{slug}', 'ListingController@show');
Route::get('/search', 'SearchController@show')->name('search_ads');
Route::get('/show_verification', 'VerificationController@show')->name('show_verification');
Route::post('/verify_user', 'VerificationController@checkVerifyCode')->name('verify_user');
Route::get('/about_us','AboutUsController@show');
Route::get('/help_and_faq','FaqController@show');
Route::get('/contact','ContactController@show');
Route::get('/login','LoginController@show')->name('login');
Route::get('/add','MyAdsController@click')->name('addShow');
Route::get('/resendCode','ResendCodeController@resendCode')->name('resendCode');
Route::get('/invitation/redirect/{token}','SuccessReferalController@redirect')->name('success_referals');
Route::post('/rate_advertisement',   'RatingController@update')->name('rate_ad');
Route::get('/add','MyAdsController@click')->name('addShow');
Route::get('/create_url','InvitationController@createToken')->name('create_url');
Route::get('/invitation/redirect/{token}','SuccessReferalController@redirect')->name('success_referals');
Route::post('/adminMessage','AdminMessageController@index');

// admin panel routes
Route::group([ 'middleware' => [ 'auth' ], 'prefix' => 'admin' ], function () {

    Route::get('/dashboard', 'Admin\DashboardController@show')->name('admin_dashboard');
    Route::get('/advertisements', 'Admin\AdvertisementController@show')->name('admin_advertisements');
    Route::post('/advertisements', 'Admin\AdvertisementController@update')->name('admin_advertisements_update');
    Route::post('/newsletter', 'Admin\NewsLetterController@store')->name('admin_newsletters_store');
    Route::get('/newsletter', 'Admin\NewsLetterController@show')->name('admin_newsletters');

    Route::get('/view_referals', 'Admin\ViewReferalsController@show')->name('view_referals');

    Route::get('/newsletter_preview/{id}', 'Admin\NewsLetterController@preview')->name('newsletter_preview');
    Route::get('/view_referals', 'Admin\ViewReferalsController@show')->name('view_referals');
    Route::get('/show_referals', 'Admin\ViewReferalsController@showStatistics')->name('show_referals');

    Route::get('/view_advertisement', 'Admin\PreviewAdvertisementController@show');
});


// public user dashboard routes
Route::group([ 'middleware' => [ 'auth' ], 'prefix' => 'my_dashboard' ], function () {
    Route::get('/profile',   'MyProfileController@index')->name('my_profile');
    Route::post('/profile',   'MyProfileController@store')->name('update_my_profile');
    Route::get('/settings',   'MySettingsController@index')->name('my_settings');
    Route::post('/settings',   'MySettingsController@store')->name('update_my_settings');
    Route::get('/ads',   'MyAdsController@index')->name('my_ads');
    Route::get('/edit_ads',   'MyAdsController@editAd')->name('my_ads_edit');
});
