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

// Route::group(['namespace' => 'Front', 'prefix'=>'client', 'middleware' => ['auth:client-web'] ], function ()
// {
//   Route::get('/', 'MainController@home')->name('client-home');
//
//
//   Route::get('login', 'AuthController@login')->name('client-login');
//   Route::get('register', 'AuthController@register')->name('client-register');
//
//   Route::get('about-us', 'MainController@aboutUs');
//
//   Route::get('post', 'MainController@post')->name('post');
//
//   Route::get('contact-us', 'MainController@contactUs');
//
//   Route::get('donator', 'MainController@donator');
//
//   Route::get('requests', 'MainController@requests');
//
//   Route::get('who-we-are', 'MainController@whoWeAre');
//
// });

Route::group(['namespace' => 'Front', 'prefix'=>'client'], function ()
{

  Route::get('/', 'MainController@home')->name('client-home');


  Route::get('login', 'AuthController@login')->name('client-login');
  Route::post('login-check', 'AuthController@loginCheck')->name('client-login-check');

  Route::get('logout', 'AuthController@logout')->name('client-logout');
  //
  //
  Route::get('register', 'AuthController@register')->name('client-register');
  Route::post('registerSave', 'AuthController@registerSave')->name('client-registerSave');

  Route::get('about-us', 'MainController@aboutUs')->name('client-about-us');

  Route::get('posts', 'MainController@posts')->name('posts');
  Route::get('post/{id}', 'MainController@post')->name('post-details');

  Route::get('donations', 'MainController@donations')->name('donations');
  Route::get('donation-details/{id}', 'MainController@donationDetails')->name('donation-details');

  Route::get('contact-us', 'MainController@contactUs')->name('client-contact-us');
  Route::post('contact-us-message', 'MainController@contactUsMessage')->name('client-contact-message');

  Route::get('profile', 'AuthController@profile')->name('client-profile');
  Route::post('update-profile', 'AuthController@updateProfile')->name('client-update-profile');

  Route::get('notification-setting', 'AuthController@notificationSetting')->name('client-notification-setting');
  Route::post('notification-setting-update', 'AuthController@notificationSettingUpdate')->name('client-notification-setting-update');

  Route::get('favourite', 'MainController@favourite')->name('client-favourite');

  Route::get('create-donation', 'MainController@createDonation')->name('client-create-donation');
  Route::post('create-donation-save', 'MainController@createDonationSave')->name('client-create-donation-save');


  // Route::get('donator', 'MainController@donator');
  //
  // Route::get('requests', 'MainController@requests');
  //
  // Route::get('who-we-are', 'MainController@whoWeAre');

});

Auth::routes();

//Admin panel
Route::group(['middleware' => ['auth'] , 'prefix'=>'admin'],function ()
{
  Route::get('/home', 'HomeController@index')->name('home');
  Route::resource('governorate','GovernorateController');
  Route::resource('city','CityController');
  Route::resource('category','CategoryController');
  Route::resource('post','PostController');
  Route::resource('client','ClientController');
  Route::get('clients-activate/{id}', 'ClientController@activate')->name('clients.activate');
  Route::get('clients-deactivate/{id}', 'ClientController@deactivate')->name('clients.deactivate');

  Route::resource('change-password','ChangePasswordController');
  Route::resource('contact','ContactController');
  Route::resource('donation','DonationController');
  Route::resource('setting','SettingController');
  Route::resource('role','RoleController');
  Route::resource('user','UserController');

});
