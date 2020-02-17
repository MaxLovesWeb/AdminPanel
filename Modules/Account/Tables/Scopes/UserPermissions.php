<?php

namespace Modules\Account\Tables\Scopes;

use Modules\Account\Entities\User;
use Yajra\DataTables\Contracts\DataTableScope;
use Illuminate\Database\Eloquent\Builder;

class UserPermissions implements DataTableScope
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {

        return $query->whereHas(
            'users', function (Builder $query) {
                return $query->where($this->user->getKeyName(), $this->user->getKey());
            }
        );

    }
}
