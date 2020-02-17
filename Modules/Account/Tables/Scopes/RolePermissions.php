<?php

namespace Modules\Account\Tables\Scopes;

use Modules\Account\Entities\Role;
use Yajra\DataTables\Contracts\DataTableScope;
use Illuminate\Database\Eloquent\Builder;

class RolePermissions implements DataTableScope
{
    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
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
            'roles', function (Builder $query) {
                return $query->where($this->role->getKeyName(), $this->role->getKey());
            }
        );

    }
}
