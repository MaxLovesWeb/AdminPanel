<?php

namespace Modules\Account\Traits;

use Illuminate\Support\Facades\Hash;

trait HasPassword
{
    /**
     * Hash Password and Set.
     *
     * @param  string $password
     * @return string
     */
    protected function hashPassword(string $password)
    {
        return Hash::make($password);
    }

}
