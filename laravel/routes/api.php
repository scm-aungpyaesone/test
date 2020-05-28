<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\AuthController@login')->name('api.login');

    Route::group([
        'middleware' => 'custom_auth_api'
    ], function () {
        Route::post('logout', 'Auth\AuthController@logout')->name('api.logout');
        Route::get('user', 'Auth\AuthController@user')->name('api.user');
    });
});
