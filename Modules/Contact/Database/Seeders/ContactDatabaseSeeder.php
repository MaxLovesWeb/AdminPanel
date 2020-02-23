<?php

namespace Modules\Contact\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Contact\Entities\Contact;
use Modules\Person\Entities\Person;

class ContactDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Person::all()->each(function (Person $person) {
            $person->contacts()->createMany([
                factory(Contact::class)->state('email')->make()->toArray(),
                factory(Contact::class)->state('fax')->make()->toArray(),
                factory(Contact::class)->state('phone')->make()->toArray(),
            ]);
        });
    }
}
