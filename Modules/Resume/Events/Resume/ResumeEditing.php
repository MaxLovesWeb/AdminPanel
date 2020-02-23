<?php

namespace Modules\Resume\Events\Resume;

use Illuminate\Queue\SerializesModels;
use Modules\Resume\Entities\Resume;

class ResumeEditing
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
