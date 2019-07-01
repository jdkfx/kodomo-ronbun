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

Route::get('/','ReportsController@index');
Route::resource('reports','ReportsController');

Route::get('/{account_name}','UsersController@show');

Route::group(['middleware' => ['auth']],function(){
    // Route::resource('reports','ReportsController', ['expect' => ['show']]);
});
