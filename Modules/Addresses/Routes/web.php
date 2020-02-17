<?php




Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('addresses', 'AddressController');

    Route::namespace('Datatables')->group(function () {

        //addresses resource
        Route::get('datatables/addresses', 'AddressDatatableController@getAll')->name('datatables.addresses.index');
        Route::get('datatables/users/{user}/addresses', 'AddressDatatableController@getUserAddresses')->name('datatables.users.addresses');


    });


});



