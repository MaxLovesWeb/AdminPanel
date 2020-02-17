<?php

namespace Modules\Account\Tables\Permissions;

use Yajra\DataTables\Html\Column;

class PermissionActions extends Column
{
    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'actions', 'name'=> 'actions',  'title' => __('account::users.columns.actions'),
            'visible' => true, 'searchable' => false, 'orderable' => false, 'exportable' => false,
            'printable' => false, 'type' => 'html',
            'view' => 'permission::datatable.actions', 'variable' => 'permission'
        ]));
    }

}
