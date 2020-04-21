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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1', 'namespace'=>'Api'],function ()
{
  Route::post('reset-password', 'AuthController@resetPassword' );

  Route::post('new-password', 'AuthController@newPassword' );

  Route::get('blood-types', 'MainController@bloodTypes' );

  Route::get('governorates', 'MainController@governorates' );

  Route::get('cities', 'MainController@cities' );

  Route::post('register', 'AuthController@register' );

  Route::post('login', 'AuthController@login' );

  Route::group(['middleware' => 'auth:api'],function ()
  {
    Route::get('posts', 'MainController@posts' );

    Route::get('post', 'MainController@post' );

    Route::post('toggle-favourite', 'MainController@toggleFavourite' );

    Route::get('list-favourites', 'MainController@listFavourites' );

    Route::post('profile', 'AuthController@profile' );

    Route::post('update-notification-settings', 'AuthController@updateNotificationSettings' );

    Route::get('get-notification-settings', 'AuthController@getNotificationSettings' );

    Route::post('register-token', 'AuthController@registerToken' );

    Route::post('remove-token', 'AuthController@removeToken' );

    Route::post('donation-request-create', 'MainController@donationRequestCreate' );

    Route::get('donation', 'MainController@donation' );

    Route::get('donations', 'MainController@donations' );

    Route::get('categories', 'MainController@categories' );

    Route::get('settings', 'MainController@settings' );

    Route::get('notifications', 'MainController@notifications' );

    Route::get('notifications-counter', 'MainController@notificationsCounter' );

    Route::post('contactus', 'MainController@contactus' );

  });

});
