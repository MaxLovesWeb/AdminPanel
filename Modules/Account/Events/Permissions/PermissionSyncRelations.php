<?php

namespace Modules\Account\Events\Permission;

use Illuminate\Queue\SerializesModels;
use Modules\Account\Entities\Permission;
use Modules\Account\Entities\Role;
use Modules\Account\Entities\User;

class PermissionSyncRelations
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
