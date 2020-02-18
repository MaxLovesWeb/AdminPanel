<?php

namespace Modules\Company\Events;

use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class CompanyDeleted
{
    use SerializesModels;

    public $request;


}
