<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Modules\Account\Entities\Role;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


// Define Super-Admin Account Factory
$factory->state(User::class, 'super-admin', [
    'name' => 'admin',
    'email' => '4336944@gmail.com',
    'password' => '$2y$10$LR3vSopEO/pj2KsMSjIN4.QxC249zWQWip0IflWiejm2xII7.fylW',
]);

$factory->afterCreatingState(User::class, 'super-admin', function ($user) {

    $role = Role::slug('super-admin')->first();

    $user->addRole($role);

});
/////////////////////////////////////////

$factory->state(User::class, 'admin', []);

$factory->state(User::class, 'moderator', []);

$factory->state(User::class, 'user', []);