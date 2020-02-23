<?php

use Illuminate\Database\Seeder;
use Modules\Account\Database\Seeders\DatabaseSeeder as AccountModuleSeeder;
use Modules\Addresses\Database\Seeders\AddressesDatabaseSeeder;
use Modules\Company\Database\Seeders\CompanyDatabaseSeeder;
use Modules\Person\Database\Seeders\PersonDatabaseSeeder;
use Modules\Resume\Database\Seeders\ResumeDatabaseSeeder;
use Modules\Contact\Database\Seeders\ContactDatabaseSeeder;
use Modules\Taggable\Database\Seeders\TaggableDatabaseSeeder;

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
            CompanyDatabaseSeeder::class,
            PersonDatabaseSeeder::class,



            AddressesDatabaseSeeder::class,
            ResumeDatabaseSeeder::class,

            ContactDatabaseSeeder::class,
            TaggableDatabaseSeeder::class,

        ]);
    }
}
