<?php

namespace App\Tables;

use Yajra\DataTables\Services\DataTable;

class UserDatatable extends DataTable
{

    protected $htmlColumns = [
        'roles', 'actions'
    ];

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function ajax()
    {
        return \DataTables::of($this->attributes['data'])
                    ->addColumn('actions', 'users.partials.table-actions')
                    ->rawColumns($this->htmlColumns)->make(true);
    }

    public function columns()
    {
        return [
            [
                'data' => 'user.id', 'visible' => false, 'title' => __('users.table.columns.id'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'user.name', 'name'=> 'name',  'title' => __('users.table.columns.name'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'user.email', 'name'=> 'email',  'title' => __('users.table.columns.email'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'user.email', 'name'=> 'roles',  'title' => __('users.table.columns.roles'),
                'searchable' => true, 'orderable' => false, 'type' => 'html'
            ],
            [
                'data' => 'user.created_at', 'name'=> 'created_at',  'title' => __('users.table.columns.created_at'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'user.updated_at', 'name'=> 'updated_at', 'title' => __('users.table.columns.updated_at'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'actions', 'name'=> 'actions',  'title' => __('users.table.columns.actions'),
                'searchable' => false, 'orderable' => false, 'exportable' => false,
                'printable' => false, 'type' => 'html'
            ],
        ];
    }

}
