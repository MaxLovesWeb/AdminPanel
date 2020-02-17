<?php

namespace Modules\Account\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Account\Entities\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Permissionitems = [
            [
                'name'        => 'Can View Users',
                'slug'        => 'view.users',
                'description' => 'Can view users',
                'module'       => 'Account',
            ],
            [
                'name'        => 'Can Create Users',
                'slug'        => 'create.users',
                'description' => 'Can create new users',
                'module'       => 'Account',

            ],
            [
                'name'        => 'Can Edit Users',
                'slug'        => 'update.users',
                'description' => 'Can edit users',
                'module'       => 'Account',

            ],
            [
                'name'        => 'Can Delete Users',
                'slug'        => 'delete.users',
                'description' => 'Can delete users',
                'module'       => 'Account',

            ],

            [
                'name'        => 'Can View Roles',
                'slug'        => 'view.roles',
                'description' => 'Can view roles',
                'module'       => 'Account',
            ],
            [
                'name'        => 'Can Create Roles',
                'slug'        => 'create.roles',
                'description' => 'Can create new roles',
                'module'       => 'Account',

            ],
            [
                'name'        => 'Can Edit Roles',
                'slug'        => 'update.roles',
                'description' => 'Can edit roles',
                'module'       => 'Account',

            ],
            [
                'name'        => 'Can Delete Roles',
                'slug'        => 'delete.roles',
                'description' => 'Can delete roles',
                'module'       => 'Account',

            ],

            [
                'name'        => 'Can View Permissions',
                'slug'        => 'view.permissions',
                'description' => 'Can view permissions',
                'module'       => 'Account',
            ],
            [
                'name'        => 'Can Create Permissions',
                'slug'        => 'create.permissions',
                'description' => 'Can create new permissions',
                'module'       => 'Account',

            ],
            [
                'name'        => 'Can Edit Permissions',
                'slug'        => 'update.permissions',
                'description' => 'Can edit permissions',
                'module'       => 'Account',

            ],
            [
                'name'        => 'Can Delete Permissions',
                'slug'        => 'delete.permissions',
                'description' => 'Can delete permissions',
                'module'       => 'Account',

            ],
        ];

        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = Permission::where('slug', '=', $Permissionitem['slug'])->first();
            if ($newPermissionitem === null) {
                $newPermissionitem = Permission::create([
                    'name'          => $Permissionitem['name'],
                    'slug'          => $Permissionitem['slug'],
                    'description'   => $Permissionitem['description'],
                    'module'         => $Permissionitem['module'],
                ]);
            }
        }
    }

}