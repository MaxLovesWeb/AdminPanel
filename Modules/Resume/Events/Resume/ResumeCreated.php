<?php

namespace Modules\Resume\Events\Resume;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Account\Entities\Role;
use Modules\Account\Entities\User;
use Modules\Company\Entities\Company;
use Modules\Resume\Entities\Resume;

class ResumeCreated
{

    use SerializesModels;

    public $resume;

    /**
     * Create a new event instance.
     *
     * @param  Resume $resume
     * @return void
     */
    public function __construct(Resume $resume)
    {
        $this->resume = $resume;
    }

}
