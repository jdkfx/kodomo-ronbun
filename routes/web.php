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

Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\RegisterController@register');

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/','ReportsController@index');

Route::get('categories','ReportsController@categories');
Route::get('categories/{category_id}','SearchController@searchCategory');

Route::get('search','SearchController@searchKeyword');

Route::get('terms', function(){
    return view('commons.terms');
});

Route::get('policy', function(){
    return view('commons.policy');
});

Route::group(['middleware' => ['auth']],function(){
    Route::post('reports','ReportsController@store');
    Route::get('reports/create','ReportsController@create');
    Route::put('reports/{id}','ReportsController@update');
    Route::delete('reports/{id}','ReportsController@destroy');
    Route::get('reports/{id}/edit','ReportsController@edit');

    Route::get('setting/edit','SettingController@edit');
    Route::put('setting','SettingController@update');

    Route::get('{account_name}/edit','UsersController@edit');
    Route::put('{account_name}','UsersController@update');

    // TODO: 退会機能を実装する
    // Route::delete('{account_name}','UsersController@destroy');
});

Route::get('reports/{id}','ReportsController@show');

Route::get('{account_name}','UsersController@show');
