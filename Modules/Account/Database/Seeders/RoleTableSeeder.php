<?php

namespace Modules\Account\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(Role::class)->state('super-admin')->create();
        factory(Role::class)->state('admin')->create();
        factory(Role::class)->state('moderator')->create();
        factory(Role::class)->state('user')->create();
        
    }
}
