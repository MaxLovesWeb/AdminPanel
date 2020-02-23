<?php

namespace Modules\Resume\Events\Education;

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
use Modules\Resume\Entities\Education;
use Modules\Resume\Entities\Experience;
use Modules\Resume\Entities\Resume;

class EducationCreated
{

    use SerializesModels;

    public $education;

    /**
     * Create a new event instance.
     *
     * @param Education $education
     */
    public function __construct(Education $education)
    {
        $this->education = $education;
    }

}
