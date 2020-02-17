<?php

namespace Modules\Account\Events\Permissions;

use Illuminate\Queue\SerializesModels;
use Modules\Account\Entities\Permission;

class PermissionUpdated
{

    use SerializesModels;

    public $permission;

    /**
     * Create a new event instance.
     *
     * @param  Permission $permission
     * @return void
     */
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

}
