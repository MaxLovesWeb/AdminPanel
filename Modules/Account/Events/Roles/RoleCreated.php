<?php

namespace Modules\Account\Events\Roles;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Account\Entities\Role;
use Modules\Account\Entities\User;

class RoleCreated
{

    use SerializesModels;

    public $role;

    /**
     * Create a new event instance.
     *
     * @param  Role $role
     * @return void
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

}
