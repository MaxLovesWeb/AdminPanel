<?php

namespace Modules\Account\Events\Users;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Account\Entities\User;

class UserUpdated
{

    use SerializesModels;

    public $user;

    /**
     * Create a new event instance.
     *
     * @param  User $updated
     * @return void
     */
    public function __construct(User $updated)
    {
        $this->user = $updated;
    }

}
