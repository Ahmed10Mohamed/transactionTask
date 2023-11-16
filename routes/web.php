<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware'=>['auth', 'verified']], function() {

            Route::group(['middleware' => 'lang'], function () {

            Route::get('/home', 'App\Http\Controllers\Admin\DashboardController@index')->name('User-Dashboard');


            /***** Dashboard *****/

                /***** profile *****/
        Route::get('/profile', 'DashboardController@profile');
        Route::post('/Update-profile', 'DashboardController@save_profile');
        Route::get('/Profile-Password', 'DashboardController@change_password');
        Route::post('/update_password', 'DashboardController@password_save');
        Route::get('/custom_logout', 'DashboardController@custom_logout')->name('custom_logout');

                    /***** Users *****/
            Route::get('Users', 'generalController@users');


                Route::get('/check_lang', 'ProfileController@check_lang')->name('Check_lang');

                    /***** Profile *****/
                    Route::group(['prefix' => 'Profile', 'as' => 'Profile.'], function () {
                            Route::get('/', 'ProfileController@index')->name('Profile.index');
                            Route::post('/Update-Profile-Admin', 'ProfileController@update_profile')->name('Update-Profile-Admin');
                            Route::get('/Security', 'ProfileController@security');
                            Route::post('/Update-Password', 'ProfileController@update_password');
                            Route::get('/Langauge', 'ProfileController@lang');
                            Route::post('/Update-Langauge', 'ProfileController@update_lang');

                    });


                });

        });
});
