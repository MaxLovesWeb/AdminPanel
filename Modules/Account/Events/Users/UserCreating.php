<?php

namespace Modules\Account\Events\Users;

use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class UserCreating
{

    use SerializesModels;

    public $request;

    /**
     * Create a new event instance.
     *
     * @param  Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

}
