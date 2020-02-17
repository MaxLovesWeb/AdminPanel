<?php

namespace Modules\Account\Tables\Roles;

use Yajra\DataTables\Html\Column;

class HasRoles extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'roles', 'name'=> 'roles', 'visible' => true, 'title' => __('account::users.columns.roles'),
            'searchable' => true, 'orderable' => false, 'type' => 'html',
            'view' => 'role::datatable.has-roles',
        ]));
    }

}
