<?php

namespace Modules\Account\Events\Roles;

use Illuminate\Queue\SerializesModels;
use Modules\Account\Entities\Role;

class RoleEditing
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
