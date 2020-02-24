<?php

namespace Modules\Account\Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Modules\Account\Entities\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginControllerTest extends AccountAuthTestCase
{

    use DatabaseMigrations;

    public function test_user_can_view_a_login_form()
    {
        $this->assertGuest();

        $response = $this->get($this->loginGetRoute());

        $response->assertViewIs('account::auth.login');
    }

    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->get($this->loginGetRoute());

        $response->assertRedirect($this->successLoginRoute());
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $user = factory(User::class)->create([
            'password' => \Hash::make($password = 'secret_password'),
        ]);

        $response = $this->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect($this->successLoginRoute());

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

        $this->assertInvalidCredentials($credentials);

        $response = $this->from($this->loginGetRoute())->post(
            $this->loginPostRoute(), $credentials
        );

        $response->assertRedirect($this->loginGetRoute());

        $response->assertSessionHasErrors('email');

        $this->assertTrue(session()->hasOldInput('email'));

        $this->assertFalse(session()->hasOldInput('password'));

        $this->assertGuest();
    }

    public function test_user_cannot_login_with_incorrect_email()
    {
        $user = factory(User::class)->create([
            'password' => \Hash::make($password = 'secret_password'),
        ]);

        $credentials = [
            'email' => 'email-does-not-exist@example.com',
            'password' => $password,
        ];

        $this->assertInvalidCredentials($credentials);

        $response = $this->from($this->loginGetRoute())->post(
            $this->loginPostRoute(), $credentials
        );

        $response->assertRedirect($this->loginGetRoute());

        $response->assertSessionHasErrors('email');

        $this->assertTrue(session()->hasOldInput('email'));

        $this->assertFalse(session()->hasOldInput('password'));

        $this->assertGuest();
    }

    public function test_user_can_not_logout_when_not_authenticated()
    {
        $response = $this->post($this->logoutRoute());

        $response->assertRedirect($this->successLogoutRoute());

        $this->assertGuest();
    }

    public function test_user_can_logout_when_authenticated()
    {
        $this->be(factory(User::class)->create());

        $response = $this->post($this->logoutRoute());

        $response->assertRedirect($this->successLogoutRoute());

        $this->assertGuest();
    }

    public function test_user_can_be_remembered()
    {
        $user = factory(User::class)->create([
            'password' => \Hash::make($password = 'secret_password'),
        ]);

        $response = $this->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => $password,
            'remember' => true,
        ]);

        $user = $user->fresh();

        $response->assertRedirect($this->successLoginRoute());

        $response->assertCookie(Auth::guard()->getRecallerName(), vsprintf('%s|%s|%s', [
            $user->id,
            $user->getRememberToken(),
            $user->password,
        ]));

        $this->assertAuthenticatedAs($user);
    }

    public function test_user_has_too_many_login_attempts()
    {
        $user = factory(User::class)->create([
            'password' => \Hash::make($password = 'secret_password'),
        ]);

        foreach (range(0, 5) as $r) {
            $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
                'email' => $user->email,
                'password' => 'invalid_password',
            ]);
        }

        $response->assertRedirect($this->loginGetRoute());

        $response->assertSessionHasErrors('email');

        $this->assertRegExp(
            $this->getTooManyLoginAttemptsMessage(),
            collect(
                $response
                    ->baseResponse
                    ->getSession()
                    ->get('errors')
                    ->getBag('default')
                    ->get('email')
            )->first()
        );
        $this->assertTrue(session()->hasOldInput('email'));

        $this->assertFalse(session()->hasOldInput('password'));

        $this->assertGuest();
    }

}
