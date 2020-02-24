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


Route::namespace('Auth')->group(function () {

    Route::get('login', 'LoginController@showLoginForm')->name('showLoginForm');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    Route::get('register', 'RegisterController@showRegistrationForm')->name('showRegisterForm');
    Route::post('register', 'RegisterController@register')->name('register');

    Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'VerificationController@resend')->name('verification.resend');

    Route::get('/credentials', 'CredentialsController@showCredentialsForm')->name('users.credentials.edit');
    Route::put('/credentials/identifier', 'CredentialsController@updateAuthIdentifier')->name('users.identifier.update');
    Route::put('/credentials/password', 'CredentialsController@updateAuthPassword')->name('users.password.update');

    Route::get('password/confirm', 'ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::post('password/confirm', 'ConfirmPasswordController@confirm');

});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::namespace('Datatables')->group(function () {

        /// user resource
        Route::get('datatables/users', 'UserDatatableController@getAll')->name('datatables.users.index');
        Route::get('datatables/users/{user}/roles', 'RoleDatatableController@getUserRoles')->name('datatables.users.roles');
        Route::get('datatables/users/{user}/permissions', 'PermissionDatatableController@getUserPermissions')->name('datatables.users.permissions');

        // company
        Route::get('datatables/companies/{company}/users', 'UserDatatableController@getCompanyUsers')->name('datatables.companies.users');

        //role resource
        Route::get('datatables/roles', 'RoleDatatableController@getAll')->name('datatables.roles.index');
        Route::get('datatables/roles/{role}/users', 'UserDatatableController@getRoleUsers')->name('datatables.roles.users');
        Route::get('datatables/roles/{role}/permissions', 'PermissionDatatableController@getRolePermissions')->name('datatables.roles.permissions');

        //permission resource
        Route::get('datatables/permissions', 'PermissionDatatableController@getAll')->name('datatables.permissions.index');
        Route::get('datatables/permissions/{permission}/roles', 'RoleDatatableController@getPermissionRoles')->name('datatables.permissions.roles');
        Route::get('datatables/permissions/{permission}/users', 'UserDatatableController@getPermissionUsers')->name('datatables.permissions.users');


    });

    Route::resource('roles', 'RoleController')->except('destroy');
    Route::resource('users', 'UserController')->except('destroy');
    Route::resource('permissions', 'PermissionController');


    Route::get('users/{user}/confirm-delete', 'UserController@confirmDelete')->name('users.confirm-delete');
    Route::put('permissions/{permission}/syncRelation', 'PermissionController@syncRelation')->name('permissions.syncRelation');
    Route::put('users/{user}/syncRelation', 'UserController@syncRelation')->name('users.syncRelation');
    Route::post('users/{user}/createAddress', 'UserController@createAddress')->name('users.createAddress');
    Route::post('users/{user}/createPerson', 'UserController@createPerson')->name('users.createPerson');
    Route::put('roles/{role}/syncRelation', 'RoleController@syncRelation')->name('roles.syncRelation');



    Route::middleware('password.confirm')->group(function () {
        Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy');
        Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
    });


});



