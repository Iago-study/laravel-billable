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

// Common
Route::get('/home', 'HomeController@index');
Route::get('/plans', 'PlansController@index');
Route::get('/locale/{language}', 'LocalesController@change')->name('locale');

// Configuration
Route::get('user/profile', 'ProfileController@index')->name('user.profile');

// Authenticate
Auth::routes();

// Magic Link
Route::get('/login/magiclink', 'Auth\MagicLoginController@show')->name('login.magiclink');
Route::post('/login/magiclink', 'Auth\MagicLoginController@sendToken');
Route::get('/login/magiclink/{token}', 'Auth\MagicLoginController@authenticate');

// Subscribe
Route::group(['middleware' => 'auth'], function () {
    Route::get('/plan/{plan}', 'PlansController@show');
    Route::get('/braintree/token', 'BraintreeTokenController@token');
    Route::post('/subscribe', 'SubscriptionsController@store');

    Route::group(['middleware' => 'subscribed'], function () {
        Route::get('/lessons', 'LessonsController@index');
        Route::get('/subscriptions', 'SubscriptionsController@index');
        Route::post('/subscription/cancel', 'SubscriptionsController@cancel');
        Route::post('/subscription/resume', 'SubscriptionsController@resume');
    });

    Route::group(['middleware' => 'premium-subscribed'], function () {
        Route::get('/prolessons', 'LessonsController@premium');
    });

});

// Webhooks
Route::post(
    'braintree/webhooks',
    '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
);

