<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Account\Entities\Role;
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

$factory->afterCreatingState(Role::class, 'user', function ($role) {

    foreach (Permissions::all() as $module) {
           
        foreach ($module->getPermissions() as $permission) {
            
            if (in_array($permission->getName(), ['viewAny', 'view']))
                $role->addPermission($permission->getKey());
        }
    }

});

$factory->afterCreatingState(Role::class, 'admin', function ($role) {

    foreach (Permissions::all() as $module) {
           
        foreach ($module->getPermissions() as $permission) {
           
            $role->addPermission($permission->getKey());
        }
    }

});

$factory->afterCreatingState(Role::class, 'moderator', function ($role) {

    foreach (Permissions::all() as $module) {
           
        foreach ($module->getPermissions() as $permission) {
            
            if (in_array($permission->getName(), ['viewAny', 'view', 'update']))
                $role->addPermission($permission->getKey());

        }
    }

});
