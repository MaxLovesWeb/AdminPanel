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

Route::prefix('company')->group(function() {
    Route::get('/', 'CompanyController@index');
});



Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('companies', 'CompanyController');

    Route::namespace('Datatables')->group(function () {

        //addresses resource
        Route::get('datatables/companies', 'CompanyDatatableController@getAll')->name('datatables.companies.index');

    });


});

