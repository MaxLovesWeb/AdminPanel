<?php

namespace Modules\Resume\Tables\Edu;

use Yajra\DataTables\Html\Column;

class EduActions extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'actions', 'name'=> 'actions',  'title' => __('resume::edu.columns.actions'),
            'searchable' => false, 'orderable' => false, 'exportable' => false,
            'printable' => false, 'type' => 'html',
            'view' => 'resume::datatable.edu.actions', 'variable' => 'education'
        ]));
    }

}
