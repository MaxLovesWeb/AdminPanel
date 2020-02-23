<?php

namespace Modules\Person\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Account\Entities\Role;
use Modules\Company\Entities\Company;
use Modules\Person\Entities\Person;

class PersonEditing
{

    use SerializesModels;

    public $person;

    /**
     * Create a new event instance.
     *
     * @param  Person $person)
     * @return void
     */
    public function __construct(Person $person)
    {
        $this->person = $person;
    }

}
