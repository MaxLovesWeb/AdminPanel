<?php

namespace Modules\Company\Events;

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

class CompanyCreated
{

    use SerializesModels;

    public $company;

    /**
     * Create a new event instance.
     *
     * @param  Company $company
     * @return void
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

}
