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

    Route::get('persons', 'PersonController@index')->name('persons.index');
    Route::get('user/{user}/person', 'PersonController@show')->name('persons.show');
    Route::get('user/{user}/person/edit', 'PersonController@edit')->name('persons.edit');
    Route::post('user/{user}/person/store', 'PersonController@store')->name('persons.store');
    Route::get('user/{user}/person/create', 'PersonController@create')->name('persons.create');
    Route::put('user/{user}/person', 'PersonController@update')->name('persons.update');
    Route::delete('user/{user}/person', 'PersonController@destroy')->name('persons.destroy');


    Route::post('persons/{person}/createAddress', 'PersonController@createAddress')->name('persons.createAddress');


    Route::namespace('Datatables')->group(function () {

        //addresses resource
        Route::get('datatables/persons', 'PersonDatatableController@getAll')->name('datatables.persons.index');

    });


});

