<?php

namespace Modules\Account\Tables;

use Yajra\DataTables\Services\DataTable;

class RoleDatatable extends DataTable
{

    protected $htmlColumns = [
        'actions'
    ];

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function ajax()
    {
        return \DataTables::of($this->attributes['data'])
                    ->addColumn('actions', 'role::partials.table-actions')
                    ->rawColumns($this->htmlColumns)->make(true);
    }

    public function columns()
    {
        return [
            [
                'data' => 'data.id', 'name'=> 'id', 'visible' => false, 'title' => __('account::table.columns.id'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'data.name', 'name'=> 'name',  'title' => __('account::table.columns.name'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'data.slug', 'name'=> 'slug',  'title' => __('account::table.columns.email'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'data.created_at', 'name'=> 'created_at',  'title' => __('account::table.columns.created_at'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'data.updated_at', 'name'=> 'updated_at', 'title' => __('account::table.columns.updated_at'),
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
