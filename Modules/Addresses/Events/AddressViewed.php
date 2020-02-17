<?php

namespace Modules\Addresses\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Account\Entities\User;
use Modules\Addresses\Entities\Address;

class AddressViewed
{

    use SerializesModels;

    public $address;

    /**
     * Create a new event instance.
     *
     * @param  Address $address
     * @return void
     */
    public function __construct(Address $address)
    {
        $this->address = $address;
    }

}
