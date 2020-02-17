<?php

namespace Modules\Account\Events\Users;

use Illuminate\Queue\SerializesModels;
use Modules\Account\Entities\User;

class UserViewed
{

    use SerializesModels;

    public $user;

    /**
     * Create a new event instance.
     *
     * @param  User $viewed
     * @return void
     */
    public function __construct(User $viewed)
    {
        $this->user = $viewed;
    }

}
