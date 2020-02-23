<?php

namespace Modules\Person\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Account\Entities\Role;
use Modules\Account\Entities\User;
use Modules\Company\Entities\Company;
use Modules\Person\Entities\Person;

class PersonCreated
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
