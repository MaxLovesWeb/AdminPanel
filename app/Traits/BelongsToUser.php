<?php

namespace App\Traits;

use App\User;

trait BelongsToUser
{
    
    /**
     * Belong to user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
