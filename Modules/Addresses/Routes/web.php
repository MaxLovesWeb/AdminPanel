<?php




Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('addresses', 'AddressesController');

});



