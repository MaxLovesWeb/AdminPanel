<?php

namespace Modules\Account\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Modules\Account\Entities\Account;
use Modules\Account\Entities\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->state('super-admin')->create();
        factory(User::class)->state('admin')->create();
        factory(User::class)->state('moderator')->create();
        factory(User::class)->state('user')->create();
        factory(User::class)->create();
    }

}
