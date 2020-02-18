<?php

namespace Modules\Company\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Account\Entities\Role;
use Modules\Company\Entities\Company;

class CompanyUpdated
{

    use SerializesModels;

    public $company;

    /**
     * Create a new event instance.
     *
     * @param  Company $company
     * @return void
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

}
