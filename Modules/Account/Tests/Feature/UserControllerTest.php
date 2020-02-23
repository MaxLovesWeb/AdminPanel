<?php

namespace Tests\Feature;

use Tests\TestCase;
use Modules\Account\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserControllerTest extends TestCase
{

    //use RefreshDatabase;
    use DatabaseMigrations;

    /**
     * @var User
     */
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        $this->actingAs($this->user);

        $this->withoutExceptionHandling();
    }

    public function test_user_can_view_index_page()
    {
        $this->get('/users')
                    ->assertSuccessful()->assertViewIs('user::index');
    }

    public function test_user_can_view_show_page()
    {
        $this->get('/users/'.$this->user->getKey())
                    ->assertSuccessful()->assertViewIs('user::show');
    }

    public function test_user_can_view_edit_page()
    {
        $this->get('/users/'.$this->user->getKey().'/edit')
                    ->assertSuccessful()->assertViewIs('user::edit');
    }

    public function test_user_can_update_user()
    {

        $overrides = [
            'first_name' => 'new first name'
        ];

        $this->put('/users/'.$this->user->getKey(), $overrides)
                    ->assertRedirect('/users/'.$this->user->getKey().'/edit');
    }

    public function test_user_can_delete_user()
    {

        $user = factory(User::class)->create([
            'password' => \Hash::make('secret_password'),
        ]);

        $confirm = [
            'password' => 'secret_password'
        ];

        // for password validation rule!
        // delete any user only after confirm YOUR AUTH password
        // 'password' => 'password'

        $this->actingAs($user);

        $this->delete('/users/'.$this->user->getKey(), $confirm)
                    ->assertRedirect('/users');
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
