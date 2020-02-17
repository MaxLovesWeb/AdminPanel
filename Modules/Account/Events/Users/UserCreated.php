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

class UserCreated
{

    use SerializesModels;

    public $user;

    /**
     * Create a new event instance.
     *
     * @param  User  $created
     * @return void
     */
    public function __construct(User $created)
    {
        $this->user = $created;
    }

}
