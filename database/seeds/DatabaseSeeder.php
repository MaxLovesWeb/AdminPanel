<?php

use Illuminate\Database\Seeder;
use Modules\Account\Database\Seeders\DatabaseSeeder as AccountModuleSeeder;
use Modules\Addresses\Database\Seeders\AddressesDatabaseSeeder;
use Modules\Company\Database\Seeders\CompanyDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AccountModuleSeeder::class,
            AddressesDatabaseSeeder::class,
            CompanyDatabaseSeeder::class
        ]);
    }
}
