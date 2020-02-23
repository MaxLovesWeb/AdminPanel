<?php

namespace Modules\Resume\Events\Resume;

use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Modules\Account\Entities\User;

class ResumeCreating
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
