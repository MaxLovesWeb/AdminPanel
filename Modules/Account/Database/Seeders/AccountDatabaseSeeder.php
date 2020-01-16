<?php

namespace Modules\Account\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class AccountDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(User::class, 2)->create()->each(function (User $user) {
           
            $user->account()->create(
                factory(Account::class)->make()->toArray()
            );
            
        });

        // $this->call("OthersTableSeeder");
    }
}
