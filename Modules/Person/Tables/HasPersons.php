<?php

namespace Modules\Person\Tables;

use Yajra\DataTables\Html\Column;

class HasPersons extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'persons', 'name'=> 'persons', 'visible' => true, 'title' => __('person::person.columns.persons'),
            'searchable' => true, 'orderable' => false, 'type' => 'html',
            'view' => 'person::datatable.has-persons',
        ]));
    }

}
