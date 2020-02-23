<?php

namespace Modules\Person\Tables;

use Yajra\DataTables\Html\Column;

class PersonActions extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'actions', 'name'=> 'actions',  'title' => __('person::person.columns.actions'),
            'searchable' => false, 'orderable' => false, 'exportable' => false,
            'printable' => false, 'type' => 'html',
            'view' => 'person::datatable.actions', 'variable' => 'person'
        ]));
    }

}
