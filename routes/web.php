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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::middleware('auth')->group(function () {
    
	Route::resource('users', 'UserController')->parameters([
	    'users' => 'id'
	])->except('create', 'store');
	
	//Route::get('users/{user}/confirm-delete', 'UserController@showDestroyForm')->name('users.confirm-delete');

});