<?php

namespace Modules\Account\Tables\Permissions;

use Yajra\DataTables\Html\Column;

class HasPermissions extends Column
{
    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'permissions', 'name'=> 'permissions', 'visible' => true,
            'title' => __('account::roles.columns.permissions'),
            'searchable' => true, 'orderable' => false, 'type' => 'html',
            'view' => 'permission::datatable.has-permissions',
        ]));
    }

}
