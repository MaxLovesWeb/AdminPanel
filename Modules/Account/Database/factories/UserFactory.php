<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use Modules\Account\Entities\Role;
use Modules\Account\Entities\User;
use Modules\Account\Entities\Permission;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

// Simple User
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),

        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'title' => $faker->title(),
        'biography' => $faker->realText(),
        'birthDate' => $faker->date(),

    ];
});

$factory->afterCreating(User::class, function (User $user) {

    $roles =  Role::slug('user')->get();

    $user->roles()->sync($roles);
});
/////////////////////////////////////////


// Define Super-Admin
$factory->state(User::class, 'super-admin', [
    'name' => 'admin',
    'email' => '4336944@gmail.com',
    'password' => '$2y$10$LR3vSopEO/pj2KsMSjIN4.QxC249zWQWip0IflWiejm2xII7.fylW',
]);

$factory->afterCreatingState(User::class, 'super-admin', function (User $user) {

    $roles =  Role::all();

    $user->roles()->sync($roles);

    $permissions =  Permission::slug('view')->get();

    $user->permissions()->sync($permissions);
});
/////////////////////////////////////////


// Admin User With Admin Role
$factory->state(User::class, 'admin', [
    'name' => 'Admin User',
    'email' => 'adminuser@example.com',
]);

$factory->afterCreatingState(User::class, 'admin', function (User $user) {

    $roles =  Role::slug(['user', 'moderator', 'admin'])->get();

    $user->roles()->sync($roles);
});
/////////////////////////////////////////


// Moderator User With Moderator Role
$factory->state(User::class, 'moderator', [
    'name' => 'Moderator User',
    'email' => 'moderatoruser@example.com',
]);

$factory->afterCreatingState(User::class, 'moderator', function (User $user) {

    $roles =  Role::slug(['user', 'moderator'])->get();

    $user->roles()->sync($roles);

    $permissions =  Permission::slug('view')
        ->orWhere->slug('update')->get();

    $user->permissions()->sync($permissions);

});
/////////////////////////////////////////
