<?php

namespace Modules\Account\Tables;

use Yajra\DataTables\Services\DataTable;

class AccountDatatable extends DataTable
{

    protected $htmlColumns = [
        'roles', 'permissions', 'actions'
    ];

    public $relations = [
        'user', 'roles', 'permissions'
    ];

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function ajax()
    {
        return \DataTables::of($this->attributes['data'])
                    ->addColumn('roles', 'account::partials.table-roles')
                    ->addColumn('permissions', 'account::partials.table-permissions')
                    ->addColumn('actions', 'account::partials.table-actions')
                    ->rawColumns($this->htmlColumns)->make(true);
    }

    public function columns()
    {
        return [
            [
                'data' => 'user.id', 'name'=> 'user.id', 'visible' => false, 'title' => __('account::table.columns.id'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'user.name', 'name'=> 'user.name',  'title' => __('account::table.columns.name'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'user.email', 'name'=> 'user.email',  'title' => __('account::table.columns.email'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'roles', 'name'=> 'roles',  'title' => __('account::table.columns.roles'),
                'searchable' => true, 'orderable' => false, 'type' => 'html'
            ],
            [
                'data' => 'permissions', 'name'=> 'permissions',  'title' => __('account::table.columns.permissions'),
                'searchable' => true, 'orderable' => false, 'type' => 'html'
            ],
            [
                'data' => 'user.created_at', 'name'=> 'user.created_at',  'title' => __('account::table.columns.created_at'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'user.updated_at', 'name'=> 'user.updated_at', 'title' => __('account::table.columns.updated_at'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'actions', 'name'=> 'actions',  'title' => __('account::table.columns.actions'),
                'searchable' => false, 'orderable' => false, 'exportable' => false,
                'printable' => false, 'type' => 'html'
            ],
        ];
    }

}
