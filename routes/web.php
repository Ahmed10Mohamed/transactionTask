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

                    /***** Profile *****/
                    Route::group(['prefix' => 'Transaction', 'as' => 'Transaction.'], function () {
                        Route::get('/', 'transactionController@index')->name('Transaction.index');
                        Route::get('/Transaction/create', 'transactionController@create')->name('Transaction.create');
                        Route::post('/', 'transactionController@store')->name('Transaction.store');
                        Route::delete('/delete/{id}', 'transactionController@destroy');
                        Route::get('/Payment/{id}', 'paymentController@payment_transaction')->name('Payment.show');
                        Route::get('/Payment/create/{id}', 'paymentController@create_payment')->name('Payment.create');
                        Route::post('/Payment/store', 'paymentController@paymenr_store')->name('Payment.store');

                });


                });

        });
});
