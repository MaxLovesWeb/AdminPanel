<?php

namespace Modules\Addresses\Events\Users;

use Illuminate\Queue\SerializesModels;
use Modules\Addresses\Entities\Address;

class AddressSyncRelations
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
