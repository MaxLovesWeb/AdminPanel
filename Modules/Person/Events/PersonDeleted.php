<?php

namespace Modules\Person\Events;

use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class PersonDeleted
{
    use SerializesModels;

    public $request;


}
