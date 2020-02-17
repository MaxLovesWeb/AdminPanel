<?php

namespace Modules\Account\Tables\Users;

use Yajra\DataTables\Html\Column;

class UserActions extends Column
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
            'view' => 'user::datatable.actions', 'variable' => 'user'
        ]));
    }

}
