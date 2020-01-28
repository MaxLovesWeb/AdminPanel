<?php

namespace Modules\Account\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Modules\Account\Entities\Account;
use Modules\Account\Entities\Role;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Account::class)->state('with-user')->create();
        factory(Account::class)->states(['with-user', 'admin'])->create();
        factory(Account::class)->states(['with-user', 'moderator'])->create();
    }

}
