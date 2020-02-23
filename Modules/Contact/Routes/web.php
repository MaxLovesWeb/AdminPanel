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



    Route::namespace('Datatables')->group(function () {

        Route::get('datatables/persons/{person}/contacts', 'ContactDatatableController@getPersonContacts')->name('datatables.persons.contacts');


    });


});

