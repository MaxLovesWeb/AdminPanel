<?php

namespace Modules\Account\Tables\Roles;

use Yajra\DataTables\Html\Column;

class RoleActions extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'actions', 'name'=> 'actions',  'title' => __('account::roles.columns.actions'),
            'searchable' => false, 'orderable' => false, 'exportable' => false,
            'printable' => false, 'type' => 'html',
            'view' => 'role::datatable.actions', 'variable' => 'role'
        ]));
    }

}
