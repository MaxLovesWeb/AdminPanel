<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginControllerTest extends TestCase
{

    use DatabaseMigrations;

    public function test_user_can_view_a_login_form()
    {
        //$this->assertGuest();

        $this->get('/login')->assertSuccessful()->assertViewIs('auth.login');
    }

    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)->get('/login')
                ->assertRedirect('/home');
    }

    public function test_user_can_login_with_correct_credentials()
    {

        $user = factory(User::class)->create([
            'password' => \Hash::make('secret_password'),
        ]);

        $credentials = [
            'email' => $user->email,
            'password' => 'secret_password',
        ];

        $this->assertCredentials($credentials);

        $this->post('/login', $credentials)
            ->assertRedirect('/home');

        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = factory(User::class)->create([
            'password' => \Hash::make('secret_password'),
        ]);

        $credentials = [
            'email' => $user->email,
            'password' => 'invalid_password',
        ];

        $response = $this->from('/login')
                            ->post('/login', $credentials);

        $this->assertInvalidCredentials($credentials);

        $response->assertRedirect('/login');

        $response->assertSessionHasErrors('email');

        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));

        $this->assertGuest();
    }

    public function test_user_can_logout_when_authenticated()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)->post('/logout') // Auth::logout()
                ->assertRedirect('/');

        $this->assertGuest();
    }

}
