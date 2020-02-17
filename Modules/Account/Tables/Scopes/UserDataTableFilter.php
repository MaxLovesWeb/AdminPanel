<?php

namespace Modules\Account\Tables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class UserDataTableFilter implements DataTableScope
{
    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query;
    }
}
