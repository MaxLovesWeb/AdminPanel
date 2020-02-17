<?php

namespace Modules\Addresses\Tables;

use Yajra\DataTables\Html\Column;

class AddressActions extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'actions', 'name'=> 'actions',  'title' => __('addresses::address.columns.actions'),
            'searchable' => false, 'orderable' => false, 'exportable' => false,
            'printable' => false, 'type' => 'html',
            'view' => 'addresses::address.datatable.actions', 'variable' => 'address'
        ]));
    }

}
