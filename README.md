# Laravel Admin Panel

#### Table of contents
- [About](#about)
- [Tools](#tools)
- [Features](#features)
- [Installation](#installation)
- [Screen Shots](#screen-shots)
- [License](#license)

## About
A set of packages for handling user, roles, permissions, resume with addresses and contacts.

## Tools
* [Composer](https://getcomposer.org/)
* [Git](https://git-scm.com/)
* [PHP 7](https://www.php.net/manual/en/)
* [Bootstrap](https://getbootstrap.com/)
* [Jquery](https://jquery.com/)
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
* [Entities](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Entities): [User](https://github.com/MaxLovesWeb/AdminPanel/blob/master/Modules/Account/Entities/User.php), [Permission](https://github.com/MaxLovesWeb/AdminPanel/blob/master/Modules/Account/Entities/Permission.php), [Role](https://github.com/MaxLovesWeb/AdminPanel/blob/master/Modules/Account/Entities/Role.php), [Company](https://github.com/MaxLovesWeb/AdminPanel/blob/master/Modules/Company/Entities/Company.php), [Address](https://github.com/MaxLovesWeb/AdminPanel/blob/master/Modules/Company/Entities/Address.php), [Resume](https://github.com/MaxLovesWeb/AdminPanel/blob/master/Modules/Company/Entities/Resume.php) and many others.
* Built in [Factories](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Database/factories), [Seedes](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Database/Seeders), [Migrations](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Database/Migrations) with ability to publish and modify your own.
* Relationships: [morphToMany](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Traits/HasRoles.php), [morphMany](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Addresses/Traits/HasAddresses.php), [hasOne](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Person/Traits/HasOnePerson.php), [hasMany](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Resume/Traits/HasResume.php), [belongsTo](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Company/Traits/BelongsToCompany.php), [belongsToMany](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Resume/Entities/Skill.php) )
* Any Entity can have independent access rights if implemented [HasPermissions](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Traits/HasPermissions.php) or/and [HasRoles](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Traits/HasRoles.php) traits.
* Any Entity can have addresses if implemented [HasAddresses](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Addresses/Traits/HasAddresses.php) trait
* Any Entity can have many companies or company if implemented [HasCompanies](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Company/Traits/HasCompanies.php) trait or [BelongsToCompany](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Company/Traits/BelongsToCompany.php)
* Any Entity can have contacts( emails, phones or faxes ) if implemented [HasContacts](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Contact/Traits/HasContacts.php) trait
* User can create [resume](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Contact/Traits/HasContacts.php) with educations, expiriences, skills, trainings.
* Lots of [datatables](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Tables/Users/UserDatatable.php) with [scopes](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Tables/Scopes/Active.php), [filters](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Filters/UserFilter.php), [actions](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Tables/Users/UserActions.php)
* [Events](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Events/Users), [Policies](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Policies), [Gates](https://laravel.com/docs/6.x/authorization#writing-gates), [Tests](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Tests)
* Blade [Resources](https://github.com/MaxLovesWeb/AdminPanel/tree/master/Modules/Account/Resources/views) views are structured to easily add and avoid duplicates and powerful [Session  Flash](https://laravel.com/docs/6.x/session) messages for easy user notifications.

## Installation
This package is very easy to set up. There are only couple of steps.

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


## Screen Shots
![Login Page](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/login.png?raw=true "Login") Login
![Registration](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/register.png?raw=true "Register") Registration
![Verify Email](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/verify-email.png?raw=true "Verify Email") Verify Email after registration, update credentials data
![Confirm Password](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/password-confirm-before-important-request.png?raw=true "Confirm Pass") Confirm Password if for example important request
![Create Address](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/create-address.png?raw=true "Create Address") Create Address
![Show Address](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/show-address.png?raw=true "Show Address") Show Address
![Resume Edit](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/resume-edit-create.png?raw=true "Resume Edit") Resume Edit
![Resume Show](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/show-resume-example.png?raw=true "Resume Template") Resume Template
![Users](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/users.png?raw=true "Show All Users") Show All Users
![Show User](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/show-user.png?raw=true "Show User") Show User
![Roles](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/permissions.png?raw=true "Roles") Roles
![Show Role](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/show-role.png?raw=true "Show Role") Show Role
![Permissions](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/permissions.png?raw=true "Permissions") Permissions
![Show Permission](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/show-permission.png?raw=true "Show Permission") Show Permission
![Confirm Delete](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/confirm-delete-with-modal-window.png?raw=true "Confirm Delete") Confirm Delete
![Flash Message](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/success-flash-message.png?raw=true " Session Flash Message") Session Flash Message
![Sync Relation](https://github.com/MaxLovesWeb/AdminPanel/blob/master/public/screenshots/sync-relations.png?raw=true "Sync Relation Example") Sync Relation Example

## License
This package is free software distributed under the terms of the [MIT license](https://opensource.org/licenses/MIT)!
