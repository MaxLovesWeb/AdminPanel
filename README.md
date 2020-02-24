# Laravel Admin Panel

#### Table of contents
- [About](#about)
- [Tools](#tools)
- [Features](#features)
- [Installation](#installation)
    - [Composer](#composer)
- [More Information](#more-information)
- [Routes](#routes)
- [Screen Shots](#screen-shots)
- [File Tree](#file-tree)
- [Opening an Issue](#opening-an-issue)
- [License](#license)

## About
A Powerful packages for handling user, roles, permissions, resume with addresses and contacts.

## Tools
* [Composer](https://getcomposer.org/)
* [PHP 7](https://www.php.net/manual/en/)
* [Bootstrap](https://getbootstrap.com/)
* [MySQL](https://github.com/mysql)
* [PhpUnit](https://phpunit.readthedocs.io/en/9.0/)
* [Homestead](https://laravel.com/docs/6.x/homestead)
* [Laravel](http://laravel.com/)
* [Blade](https://laravel.com/docs/6.x/blade)
* [Admin LTE3](https://github.com/jeroennoten/Laravel-AdminLTE)
* [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar) 
* [Laravel-Modules](https://github.com/nWidart/laravel-modules)
* [Laravel-Datatables](https://github.com/yajra/laravel-datatables)

## Features
|  |
| :------------ |
|[Entities](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Entities): [User](https://github.com/MaxLovesWeb/AdminPanel/blob/master/Modules/Account/Entities/User.php), [Permission](https://github.com/MaxLovesWeb/AdminPanel/blob/master/Modules/Account/Entities/Permission.php), [Role](https://github.com/MaxLovesWeb/AdminPanel/blob/master/Modules/Account/Entities/Role.php)|
|Built in [Factories](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Database/factories), [Seedes](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Database/Seeders), [Migrations](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Database/Migrations) with ability to publish and modify your own.|
|Relationships: [morphToMany](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Traits/HasRoles.php), [morphMany](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Addresses/Traits/HasAddresses.php), [hasOne](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Person/Traits/HasOnePerson.php), [hasMany](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Resume/Traits/HasResume.php), [belongsTo](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Company/Traits/BelongsToCompany.php), [belongsToMany](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Resume/Entities/Skills.php) ), |
|Any Entity can have independent access rights if implemented [HasPermissions](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Traits/HasPermissions.php) or/and [HasRoles](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Traits/HasRoles.php) traits|
|Any Entity can have addresses if implemented [HasAddresses](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Addresses/Traits/HasAddresses.php) trait|
|Any Entity can have many companies or company if implemented [HasCompanies](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Company/Traits/HasCompanies.php) trait or [BelongsToCompany](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Company/Traits/BelongsToCompany.php)|
|Any Entity can have contacts( emails, phones or faxes ) if implemented [HasContacts](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Contact/Traits/HasContacts.php) trait|
|User can create [resume](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Contact/Traits/HasContacts.php) with educations, expiriences, skills, trainings.|
|Lots of [datatables](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Tables/Users/UserDatatable.php) with [scopes](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Tables/Scopes/Active.php), [filter](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Filters/UserFilter.php), [actions](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Tables/Users/UserActions.php)|
|[Events](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Events/Users), [Policies](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Policies), [Gates](https://laravel.com/docs/6.x/authorization#writing-gates), [Tests](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Tests) |
|Blade [Resources](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Resources/views) views are structured to easily add and avoid duplicates|

## Installation
This package is very easy to set up. There are only couple of steps.

### Composer
1. Run `git clone https://github.com/MaxLovesWeb/AdminPanel laraveladmin`
2. Create a MySQL database for the project
    * ```mysql -u root -p```, if using Vagrant: ```mysql -u homestead -psecret```
    * ```create database admin;```
    * ```\q```
3. From the projects root run `cp .env.example .env`
4. Configure your `.env` file
5. Run `composer install` from the projects root folder
6. From the projects root folder run:
```
php artisan vendor:publish
```
7. From the projects root folder run `php artisan key:generate`
8. From the projects root folder run `php artisan migrate`
9. From the projects root folder run `composer dump-autoload`
10. From the projects root folder run `php artisan db:seed`

## Routes
```
+--------+-----------+---------------------------------+-----------------------------------------------+-----------------------------------------------------------------------------------------------------------------+---------------------+
| Domain | Method    | URI                             | Name                                          | Action                                                                                                          | Middleware          |
+--------+-----------+---------------------------------+-----------------------------------------------+-----------------------------------------------------------------------------------------------------------------+---------------------+
|        | GET|HEAD  | permission-deleted/{id}         | laravelroles::permission-show-deleted         | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelpermissionsDeletedController@show                         | web,auth,role:admin |
|        | DELETE    | permission-destroy/{id}         | laravelroles::permission-item-destroy         | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelpermissionsDeletedController@destroy                      | web,auth,role:admin |
|        | PUT       | permission-restore/{id}         | laravelroles::permission-restore              | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelpermissionsDeletedController@restorePermission            | web,auth,role:admin |
|        | POST      | permissions                     | laravelroles::permissions.store               | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelPermissionsController@store                               | web,auth,role:admin |
|        | GET|HEAD  | permissions                     | laravelroles::permissions.index               | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelPermissionsController@index                               | web,auth,role:admin |
|        | GET|HEAD  | permissions-deleted             | laravelroles::permissions-deleted             | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelpermissionsDeletedController@index                        | web,auth,role:admin |
|        | DELETE    | permissions-deleted-destroy-all | laravelroles::destroy-all-deleted-permissions | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelpermissionsDeletedController@destroyAllDeletedPermissions | web,auth,role:admin |
|        | POST      | permissions-deleted-restore-all | laravelroles::permissions-deleted-restore-all | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelpermissionsDeletedController@restoreAllDeletedPermissions | web,auth,role:admin |
|        | GET|HEAD  | permissions/create              | laravelroles::permissions.create              | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelPermissionsController@create                              | web,auth,role:admin |
|        | PUT|PATCH | permissions/{permission}        | laravelroles::permissions.update              | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelPermissionsController@update                              | web,auth,role:admin |
|        | GET|HEAD  | permissions/{permission}        | laravelroles::permissions.show                | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelPermissionsController@show                                | web,auth,role:admin |
|        | DELETE    | permissions/{permission}        | laravelroles::permissions.destroy             | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelPermissionsController@destroy                             | web,auth,role:admin |
|        | GET|HEAD  | permissions/{permission}/edit   | laravelroles::permissions.edit                | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelPermissionsController@edit                                | web,auth,role:admin |
|        | GET|HEAD  | role-deleted/{id}               | laravelroles::role-show-deleted               | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesDeletedController@show                               | web,auth,role:admin |
|        | DELETE    | role-destroy/{id}               | laravelroles::role-item-destroy               | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesDeletedController@destroy                            | web,auth,role:admin |
|        | PUT       | role-restore/{id}               | laravelroles::role-restore                    | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesDeletedController@restoreRole                        | web,auth,role:admin |
|        | POST      | roles                           | laravelroles::roles.store                     | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesController@store                                     | web,auth,role:admin |
|        | GET|HEAD  | roles                           | laravelroles::roles.index                     | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesController@index                                     | web,auth,role:admin |
|        | GET|HEAD  | roles-deleted                   | laravelroles::roles-deleted                   | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesDeletedController@index                              | web,auth,role:admin |
|        | DELETE    | roles-deleted-destroy-all       | laravelroles::destroy-all-deleted-roles       | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesDeletedController@destroyAllDeletedRoles             | web,auth,role:admin |
|        | POST      | roles-deleted-restore-all       | laravelroles::roles-deleted-restore-all       | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesDeletedController@restoreAllDeletedRoles             | web,auth,role:admin |
|        | GET|HEAD  | roles/create                    | laravelroles::roles.create                    | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesController@create                                    | web,auth,role:admin |
|        | DELETE    | roles/{role}                    | laravelroles::roles.destroy                   | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesController@destroy                                   | web,auth,role:admin |
|        | PUT|PATCH | roles/{role}                    | laravelroles::roles.update                    | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesController@update                                    | web,auth,role:admin |
|        | GET|HEAD  | roles/{role}                    | laravelroles::roles.show                      | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesController@show                                      | web,auth,role:admin |
|        | GET|HEAD  | roles/{role}/edit               | laravelroles::roles.edit                      | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesController@edit                                      | web,auth,role:admin |
+--------+-----------+---------------------------------+-----------------------------------------------+-----------------------------------------------------------------------------------------------------------------+---------------------+

```

## Screen Shots
![Laravel Roles GUI Dashboard](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-roles/screenshots/roles-gui-1.png)
![Laravel Roles GUI Create New Role](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-roles/screenshots/roles-gui-2.png)
![Laravel Roles GUI Edit Role](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-roles/screenshots/roles-gui-3.png)
![Laravel Roles GUI Show Role](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-roles/screenshots/roles-gui-4.png)
![Laravel Roles GUI Delete Role](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-roles/screenshots/roles-gui-5.png)
![Laravel Roles GUI Success Deleted](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-roles/screenshots/roles-gui-6.png)
![Laravel Roles GUI Deleted Role Show](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-roles/screenshots/roles-gui-7.png)
![Laravel Roles GUI Restore Role](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-roles/screenshots/roles-gui-8.png)
![Laravel Roles GUI Delete Permission](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-roles/screenshots/roles-gui-9.png)
![Laravel Roles GUI Show Permission](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-roles/screenshots/roles-gui-10.png)
![Laravel Roles GUI Permissions Dashboard](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-roles/screenshots/roles-gui-11.png)
![Laravel Roles GUI Create New Permission](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-roles/screenshots/roles-gui-12.png)
![Laravel Roles GUI Roles Soft Deletes Dashboard](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-roles/screenshots/roles-gui-13.png)
![Laravel Roles GUI Permissions Soft Deletes Dashboard](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-roles/screenshots/roles-gui-14.png)
![Laravel Roles GUI Success Restore](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-roles/screenshots/roles-gui-15.png)

## License
This package is free software distributed under the terms of the [MIT license](https://opensource.org/licenses/MIT)!
