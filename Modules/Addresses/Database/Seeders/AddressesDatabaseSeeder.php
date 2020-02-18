<?php

namespace Modules\Addresses\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\User;
use Modules\Addresses\Entities\Address;

class AddressesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function (User $user) {
            $user->addresses()->createMany([
                factory(Address::class)->state('billing')->make()->toArray(),
                factory(Address::class)->state('primary')->make()->toArray(),
                factory(Address::class)->state('shipping')->make()->toArray(),
            ]);
        });
    }
}
