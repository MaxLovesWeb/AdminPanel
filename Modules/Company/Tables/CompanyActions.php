<?php

namespace Modules\Company\Tables;

use Yajra\DataTables\Html\Column;

class CompanyActions extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'actions', 'name'=> 'actions',  'title' => __('company::company.columns.actions'),
            'searchable' => false, 'orderable' => false, 'exportable' => false,
            'printable' => false, 'type' => 'html',
            'view' => 'company::datatable.actions', 'variable' => 'company'
        ]));
    }

}
