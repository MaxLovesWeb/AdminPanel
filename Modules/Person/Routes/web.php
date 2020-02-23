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

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('persons', 'UserPersonController@index')->name('persons.index');
    Route::get('user/{user}/person', 'UserPersonController@show')->name('persons.show');
    Route::get('user/{user}/person/edit', 'UserPersonController@edit')->name('persons.edit');
    Route::post('user/{user}/person/store', 'UserPersonController@store')->name('persons.store');
    Route::get('user/{user}/person/create', 'UserPersonController@create')->name('persons.create');
    Route::put('user/{user}/person', 'UserPersonController@update')->name('persons.update');
    Route::delete('user/{user}/person', 'UserPersonController@destroy')->name('persons.destroy');


    Route::post('persons/{person}/createAddress', 'PersonController@createAddress')->name('persons.createAddress');


    Route::namespace('Datatables')->group(function () {

        //addresses resource
        Route::get('datatables/persons', 'PersonDatatableController@getAll')->name('datatables.persons.index');

    });


});

