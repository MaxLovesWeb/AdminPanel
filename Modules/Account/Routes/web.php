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

Route::middleware('auth')->group(function () {
    
	Route::resource('accounts', 'AccountController')->except('create', 'store', 'show');
	Route::get('accounts/{account?}', 'AccountController@show')->name('accounts.show');
	Route::get('account/confirm-delete', 'AccountController@confirmDelete')->name('accounts.confirm-delete');

	/*Route::get('users', 'AccountController@index')->name('accounts.index');

	Route::get('users/{user}/account', 'AccountController@show')->name('accounts.show');

	Route::get('users/{user}/account/edit', 'AccountController@edit')->name('accounts.edit');

	Route::put('users/{user}/account', 'AccountController@update')->name('accounts.update');
	
	Route::get('users/{user}/account/create', 'AccountController@create')->name('accounts.create');

	Route::post('users/{user}/account', 'AccountController@store')->name('accounts.store');

	Route::delete('users/{user}/account', 'AccountController@destroy')->name('accounts.delete');
	*/
});

