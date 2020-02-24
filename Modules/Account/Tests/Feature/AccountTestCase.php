<?php

namespace Modules\Account\Tests\Feature;

use Modules\Account\Providers\AccountServiceProvider;
use Tests\TestCase;

abstract class AccountTestCase extends TestCase
{

    protected function successLoginRoute()
    {
        return route('users.index');
    }

    protected function loginGetRoute()
    {
        return route('login');
    }

    protected function loginPostRoute()
    {
        return route('login');
    }

    protected function logoutRoute()
    {
        return route('logout');
    }

    protected function successLogoutRoute()
    {
        return $this->loginGetRoute();
    }

    protected function getTooManyLoginAttemptsMessage()
    {
        return sprintf('/^%s$/', str_replace('\:seconds', '\d+', preg_quote(__('auth.throttle'), '/')));
    }

}
