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

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');


/*
 * Front End Routes
 */


Route::get('/', 'UserController@dashboard')->name('dashboard');

Route::get('users', 'UserController@index')->name('user.show');
Route::get('users/create', 'UserController@create')->name('user.create');
Route::post('users/create', 'UserController@store');
Route::get('users/edit/{id}', 'UserController@edit')->name('user.edit');
Route::post('users/edit/{id}', 'UserController@update');
Route::get('users/edit-status/{id}', 'UserController@editStatus')->name('user.edit.status');
Route::post('users/edit-status/{id}', 'UserController@updateStatus');
Route::get('users/delete/{id}', 'UserController@delete')->name('user.delete');
Route::post('users/delete/{id}', 'UserController@destroy');

Route::get('user/enable/{token}', 'UserController@verificationForm')->name('user.verification');
Route::post('user/enable', 'UserController@verifyUser');

