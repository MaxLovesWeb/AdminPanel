<?php

namespace Modules\Account\Tables\Scopes;

use Modules\Account\Entities\Role;
use Yajra\DataTables\Contracts\DataTableScope;
use Illuminate\Database\Eloquent\Builder;

class RoleUsers implements DataTableScope
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
        return $query->whereHas('roles', function (Builder $query) {
            return $query->where('role_id', $this->role->getKey());
        });
    }
}
