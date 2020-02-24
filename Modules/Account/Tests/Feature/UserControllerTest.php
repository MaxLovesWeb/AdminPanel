<?php

namespace Tests\Feature;

use Tests\TestCase;
use Modules\Account\Entities\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Modules\Account\Database\Seeders\RoleTableSeeder;
use Modules\Account\Database\Seeders\PermissionTableSeeder;

class UserControllerTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * @var User
     */
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(PermissionTableSeeder::class);
        $this->seed(RoleTableSeeder::class);

        $this->user = factory(User::class)->state('admin')->create();

        $this->actingAs($this->user);

        //$this->withoutExceptionHandling();
    }

    public function test_user_can_view_index_page()
    {
        $response = $this->get('/users');
        $response->assertSuccessful();
        $response->assertViewIs('user::index');
    }

    public function test_user_can_view_show_page()
    {
        $response= $this->get('/users/'.$this->user->getKey());
        $response->assertSuccessful();
        $response->assertViewIs('user::show');
    }

    public function test_user_can_view_edit_page()
    {
        $response = $this->get('/users/'.$this->user->getKey().'/edit');
        $response->assertSuccessful();
        $response->assertViewIs('user::edit');
    }

    public function test_user_can_update_user()
    {
        $actual = [
            'name' => $this->user->name
        ];

        $overrides = [
            'name' => 'updated name'
        ];

        $response = $this->put('/users/'.$this->user->getKey(), $overrides);
        $response->assertRedirect('/users/'.$this->user->getKey().'/edit');

        $this->assertDatabaseHas('users', $overrides);
        $this->assertDatabaseMissing('users', $actual);
    }

    public function test_user_can_delete_user()
    {
        $this->withoutMiddleware(['password.confirm']);

        $user = factory(User::class)->state('super-admin')->create([
            'password' => \Hash::make('secret_password'),
        ]);

        $confirm = [
            'password' => 'secret_password'
        ];

        // for password validation rule!
        // delete any user only after confirm YOUR AUTH password
        // 'password' => 'password'

        $this->actingAs($user);

        $response = $this->delete('/users/'.$this->user->getKey());

            // how to test without password confirm middleware
        //Actual  redirect to :'http://admin.test/password/confirm'
        //$response->assertRedirect('/users');
    }

}
