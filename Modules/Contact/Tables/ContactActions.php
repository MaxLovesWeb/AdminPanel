<?php

namespace Modules\Contact\Tables;

use Yajra\DataTables\Html\Column;

class ContactActions extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'actions', 'name'=> 'actions',  'title' => __('contact::contact.columns.actions'),
            'searchable' => false, 'orderable' => false, 'exportable' => false,
            'printable' => false, 'type' => 'html',
            'view' => 'contact::datatable.actions', 'variable' => 'contact'
        ]));
    }

}
