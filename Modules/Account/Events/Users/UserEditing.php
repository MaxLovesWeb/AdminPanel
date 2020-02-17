<?php

namespace Modules\Account\Events\Users;

use Illuminate\Queue\SerializesModels;
use Modules\Account\Entities\Role;
use Modules\Account\Entities\User;

class UserEditing
{

    use SerializesModels;

    public $user;

    /**
     * Create a new event instance.
     *
     * @param  User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

}
