<?php

namespace Modules\Resume\Events\Training;

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
use Modules\Resume\Entities\Training;

class TrainingCreated
{

    use SerializesModels;

    public $training;

    /**
     * Create a new event instance.
     *
     * @param Education $training
     */
    public function __construct(Training $training)
    {
        $this->training = $training;
    }

}
