<?php

namespace Modules\Resume\Tables\Training;

use Yajra\DataTables\Html\Column;

class TrainingActions extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'actions', 'name'=> 'actions',  'title' => __('resume::training.columns.actions'),
            'searchable' => false, 'orderable' => false, 'exportable' => false,
            'printable' => false, 'type' => 'html',
            'view' => 'resume::datatable.training.actions', 'variable' => 'training'
        ]));
    }

}
