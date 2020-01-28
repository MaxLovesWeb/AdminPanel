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

    //use RefreshDatabase;

    use CreateAccounts, ReadAccounts, UpdateAccounts, DeleteAccounts;

    use DatabaseMigrations;

    protected $user, $account;

    protected function setUp(): void
    {
        parent::setUp();

        $this->account = factory(Account::class)
                            ->states(['with-user'])->create();

        $this->user = $this->account->user;

        $this->actingAs($this->user);

        $this->withoutExceptionHandling();
    }

    public function test_can_get_all_accounts()
    {     
        factory(Account::class, 10)->states(['with-user'])->create();

        $collection = Account::all();

        $this->assertInstanceOf(Collection::class, $collection);

        foreach ($collection as $model) {
            $this->assertInstanceOf(Account::class, $model);
        }
    }

    public function test_can_read_account()
    {     

        $account = Account::find($this->account->getKey());
        
        $this->assertInstanceOf(Account::class, $account);

        $this->assertEquals($account->user, $this->user);
    }

    public function test_can_create_account()
    {
        $user = factory(User::class)->create();

        $data = [
            'first_name' => $user->name
        ];
      
        $account = $this->createAccount($user, $data);
      
        $this->assertInstanceOf(Account::class, $account);

        $this->assertEquals($data['first_name'], $account->first_name);
    }

    public function test_can_update_account()
    {

        $data = [
            'first_name' => 'new_first_name',
        ];

        $updated = $this->updateAccount($this->account, $data);
    
        $this->assertTrue($updated);

        $this->assertEquals($data['first_name'], $this->account->first_name);
    }

    public function test_can_delete_account()
    {

        $data = clone $this->account;

        $deleted = $this->deleteAccount($this->account->getKey());

        $this->assertDeleted('accounts', ['id' => $data->getKey()] );
    }

}
