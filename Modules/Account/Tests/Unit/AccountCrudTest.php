<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Modules\Account\Entities\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Validator;
use Modules\Account\Http\Requests\UpdateAccountFormRequest;


use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


use Illuminate\Support\Collection;

use Modules\Account\Traits\CreateAccounts;
use Modules\Account\Traits\ReadAccounts;
use Modules\Account\Traits\UpdateAccounts;
use Modules\Account\Traits\DeleteAccounts;

class AccountCrudTest extends TestCase
{


}
