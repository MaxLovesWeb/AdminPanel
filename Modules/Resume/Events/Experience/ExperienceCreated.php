<?php

namespace Modules\Resume\Events\Experience;

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
use Modules\Resume\Entities\Experience;
use Modules\Resume\Entities\Resume;

class ExperienceCreated
{

    use SerializesModels;

    public $experience;

    /**
     * Create a new event instance.
     *
     * @param Experience $experience
     */
    public function __construct(Experience $experience)
    {
        $this->experience = $experience;
    }

}
