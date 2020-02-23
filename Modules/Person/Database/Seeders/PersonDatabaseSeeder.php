<?php

namespace Modules\Person\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\User;
use Modules\Person\Entities\Person;

class PersonDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::all()->each(function (User $user) {
            $user->person()->create(
                factory(Person::class)->make()->toArray()
            );
        });
    }
}
