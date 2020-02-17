<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Account\Entities\Role;
use Modules\Account\Entities\Permission;
use Faker\Generator as Faker;


$factory->define(Role::class, function (Faker $faker) {

    return [
        'name' => $faker->unique()->jobTitle,
        'slug' => $faker->unique()->slug,
        'description' => $faker->sentence,
    ];
});

$factory->state(Role::class, 'super-admin', [
        'name' => 'super-admin',
        'slug' => 'super-admin',
        'description' => 'this is super-admin role',
    ]);

$factory->state(Role::class, 'admin', [
        'name' => 'admin',
        'slug' => 'admin',
        'description' => 'this is admin role',
    ]);

$factory->state(Role::class, 'user', [
        'name' => 'user',
        'slug' => 'user',
        'description' => 'this is user role',
    ]);

$factory->state(Role::class, 'moderator', [
        'name' => 'moderator',
        'slug' => 'moderator',
        'description' => 'this is moderator role',
    ]);

$factory->afterCreatingState(Role::class, 'super-admin', function (Role $role) {

    $permissions = Permission::all();

    $role->permissions()->sync($permissions);

});

$factory->afterCreatingState(Role::class, 'user', function (Role $role) {

    $permissions = Permission::slug('view')->get();

    //dd($permissions);

    $role->permissions()->sync($permissions);

});

$factory->afterCreatingState(Role::class, 'admin', function (Role $role) {

    $permissions = Permission::slug('view')
                        ->orWhere->slug('update')
                        ->orWhere->slug('create')->get();

    $role->permissions()->sync($permissions);

});

$factory->afterCreatingState(Role::class, 'moderator', function (Role $role) {

    $permissions =  Permission::slug('view')
                            ->orWhere->slug('update')->get();

    $role->permissions()->sync($permissions);

});
