<?php

namespace Modules\Template\Tables\Scopes;

use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTableScope;

class RequestFilter implements DataTableScope
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * UserDataTableFilter constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->filter($this->request->all());
    }
}
