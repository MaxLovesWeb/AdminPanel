<?php

namespace Modules\Company\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\User;
use Modules\Company\Entities\Company;

class CompanyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(Company::class, 5)->create();

        User::all()->each(function (User $user) {
            $user->companies()->sync(
                factory(Company::class)->create()
            );
        });
    }
}
