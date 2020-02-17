<?php

namespace Modules\Account\Tables\Users;

use Yajra\DataTables\Html\Column;

class HasUsers extends Column
{



    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'users', 'name'=> 'users', 'visible' => true,
            'title' => __('account::roles.columns.users'),
            'searchable' => true, 'orderable' => false, 'type' => 'html',
            'view' => 'user::datatable.has-users'
        ]));
    }

}
