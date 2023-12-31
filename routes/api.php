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

Route::group(['namespace' => 'App\Http\Controllers\API', 'middleware' => 'APISettings'], function () {




    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');


    Route::group(['middleware' => 'auth:api'], function () {
            Route::get('Profile', 'AuthController@profile');
            Route::post('update_profile', 'AuthController@update_profile');

            // ************  Tranaction  ***************//
            Route::get('MyTranaction', 'TranactionController@my_tranaction');



        });






});
