<?php

use Illuminate\Database\Seeder;
use Modules\Account\Database\Seeders\DatabaseSeeder as AccountModuleSeeder;

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
        	AccountModuleSeeder::class
        ]);
    }
}
