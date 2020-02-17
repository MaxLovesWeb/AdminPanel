<?php

namespace Modules\Account\Events\Roles;

use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class RoleDeleted
{
    use SerializesModels;

    public $request;


}
