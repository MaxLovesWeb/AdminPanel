<?php

namespace Modules\Addresses\Events;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;
use Modules\Addresses\Entities\Address;

class AddressCreated
{

    use SerializesModels;

    public $address;

    /**
     * Create a new event instance.
     *
     * @param  Model $address
     * @return void
     */
    public function __construct(Model $address)
    {
        $this->address = $address;
    }

}
