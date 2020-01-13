<?php

namespace Modules\Account\Traits;

use Modules\Account\Entities\Account;

trait HasAccount
{

    public static function bootHasAccount()
    {
        //parent::boot();
        static::created(function($model)
        {
            $account = [
                'first_name' => $model->name,
                'email' => $model->email,
            ];

            $model->account()->create($account);
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