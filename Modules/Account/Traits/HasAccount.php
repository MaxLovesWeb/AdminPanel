<?php

namespace Modules\Account\Traits;

use Modules\Account\Entities\Account;
use Modules\Account\Entities\AccountFactory;

trait HasAccount
{

    public static function bootHasAccount()
    {
        static::created(function ($model)
        {
            $model->account()->create();    
        });

        static::deleting(function ($model)
        {
            $model->account()->delete();    
        });
    }

    /**
     * User has one account
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function account()
    {
        return $this->hasOne(Account::class);
    }

}