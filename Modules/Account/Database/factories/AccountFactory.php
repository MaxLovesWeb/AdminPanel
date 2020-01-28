<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Modules\Account\Entities\Role;
use Modules\Account\Entities\Account;
use Modules\Account\Entities\Permissions;

// Define Account, use only for make .... user_id is null
$factory->define(Account::class, function (Faker $faker) {

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'title' => $faker->title(),
        'birthDate' => $faker->date(),
        'birthPlace' => $faker->countryCode,
        'faxNumber' => $faker->phoneNumber,
        'jobTitle' => $faker->jobTitle,
        'biography' => $faker->realText(),
        'nationality' => $faker->countryCode,
    ];
});

// Without user account can not be saved user_id can not be null!!!
$factory->state(Account::class, 'with-user', function (Faker $faker) {

    $user = factory(User::class)->create();

    return [
        'user_id'   => $user->id,
        'email'     => $user->email,
    ];
});

// Define Account Factory With Admin Role
$factory->state(Account::class, 'admin', []);

$factory->afterCreatingState(Account::class, 'admin', function ($account) {

    $roles = Role::slug('admin')->get();

    $account->syncRoles($roles);

});
/////////////////////////////////////////



// Define Account Factory With Moderator Role
$factory->state(Account::class, 'moderator', []);

$factory->afterCreatingState(Account::class, 'moderator', function ($account) {

    $role = Role::slug('admin')->first();

    $account->addRole($role);

    foreach (Permissions::abilities(['create']) as $permission) {
        $account->addPermission($permission->getKey());
    }

});
/////////////////////////////////////////
