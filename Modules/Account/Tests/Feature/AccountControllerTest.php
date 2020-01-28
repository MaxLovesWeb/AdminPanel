<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Modules\Account\Entities\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Validator;
use Modules\Account\Http\Requests\UpdateAccountFormRequest;


use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AccountControllerTest extends TestCase
{

    //use RefreshDatabase;
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

    public function test_user_can_view_index_page()
    {     
        $this->get('/accounts')
                    ->assertSuccessful()->assertViewIs('account::index');
    }

    public function test_user_can_view_show_page()
    {
        $this->get('/accounts/'.$this->account->getKey())
                    ->assertSuccessful()->assertViewIs('account::show');
    }

    public function test_user_can_view_edit_page()
    {

        $this->get('/accounts/'.$this->account->getKey().'/edit')
                    ->assertSuccessful()->assertViewIs('account::edit');
    }

    public function test_user_can_update_account()
    {

        $overrides = [
           // 'user_id' => $this->user->id,
            'first_name' => 'new first name'
        ];

        $this->assertDatabaseHas('users', ['id' => $this->user->id]);

        $this->put('/accounts/'.$this->account->getKey(), $overrides)
                    ->assertRedirect('/accounts/'.$this->account->getKey().'/edit');
    }

    public function test_user_can_delete_account()
    {

        $user = factory(User::class)->create([
            'password' => \Hash::make('secret_password'),
        ]);

        $confirm = [
            'password' => 'secret_password'
        ];

        // for password validation rule!
        // delete any account only after confirm YOUR AUTH password
        // 'password' => 'password'
        // we can add <delete> only their account
        $this->actingAs($user);

        $this->delete('/accounts/'.$this->account->getKey(), $confirm)
                    ->assertRedirect('/accounts');
    }

    /*
    public function test_user_cannot_view_pages_when_guest()
    {
        $user = factory(User::class)->create();
        $redirectUrl = '/login';

        $this->assertGuest();

        $this->get('/accounts')->assertRedirect($redirectUrl);
        $this->get('/accounts/'.$this->account->getKey())->assertRedirect($redirectUrl);
        $this->get('/accounts/'.$this->account->getKey().'/edit')->assertRedirect($redirectUrl);
    }*/


}
