<?php

namespace Modules\Account\Tests\Feature;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Modules\Account\Entities\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterControllerTest extends AccountAuthTestCase
{

    use DatabaseMigrations;

    public function test_user_can_view_a_registration_form()
    {
        $this->assertGuest();

        $response = $this->get($this->registerGetRoute());

        $response->assertViewIs('account::auth.register');
    }

    public function test_user_cannot_view_a_registration_form_when_authenticated()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->get($this->registerGetRoute());

        $response->assertRedirect($this->successRegisterRoute());
    }

    public function test_user_can_register_with_correct_credentials()
    {

        $credentials = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'correct_password',
            'password_confirmation' => 'correct_password',
        ];

        $response = $this->post($this->registerPostRoute(), $credentials);

        $response->assertRedirect($this->successRegisterRoute());

        $this->assertCount(1, $users = User::all());

        $this->assertAuthenticatedAs($user = $users->first());

        $this->assertEquals($credentials['name'], $user->name);
        $this->assertEquals($credentials['email'], $user->email);

        $this->assertCredentials($credentials);
    }

    public function test_user_cannot_register_without_name()
    {
        $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
            'name' => '',
            'email' => 'john@example.com',
            'password' => 'correct_password',
            'password_confirmation' => 'correct_password',
        ]);

        $this->assertCount(0, User::all());
        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('name');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function test_user_cannot_register_without_email()
    {
        $response = $this->post($this->registerPostRoute(), [
            'name' => 'john',
            //'email' => '',
            'password' => 'correct_password',
            'password_confirmation' => 'correct_password',
        ]);

        $this->assertCount(0, User::all());
        //$response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }


    public function test_user_can_not_register_with_invalid_email()
    {
        $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'password' => 'correct_password',
            'password_confirmation' => 'correct_password',
        ]);

        $this->assertCount(0, User::all());
        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function test_user_can_not_register_without_password()
    {
        $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => '',
            'password_confirmation' => '',
        ]);

        $response->assertRedirect($this->registerGetRoute());

        $this->assertCount(0, User::all());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function test_user_can_not_register_without_password_confirmation()
    {
        $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'correct_password',
            'password_confirmation' => '',
        ]);

        $response->assertRedirect($this->registerGetRoute());
        $this->assertCount(0, User::all());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function test_user_can_not_register_if_pass_not_matching()
    {
        $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'correct_password',
            'password_confirmation' => 'invalid_password',
        ]);

        $response->assertRedirect($this->registerGetRoute());

        $this->assertCount(0, User::all());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

}
