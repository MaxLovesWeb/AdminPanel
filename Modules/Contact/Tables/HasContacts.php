<?php

namespace Modules\Contact\Tables;

use Yajra\DataTables\Html\Column;

class HasContacts extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'companies', 'name'=> 'companies', 'visible' => true, 'title' => __('company::company.columns.companies'),
            'searchable' => true, 'orderable' => false, 'type' => 'html',
            'view' => 'company::datatable.has-companies',
        ]));
    }

}
