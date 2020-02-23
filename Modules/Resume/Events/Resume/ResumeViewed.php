<?php

namespace Modules\Resume\Events\Resume;

use Illuminate\Queue\SerializesModels;
use Modules\Account\Entities\Role;
use Modules\Company\Entities\Company;
use Modules\Resume\Entities\Resume;

class ResumeViewed
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
