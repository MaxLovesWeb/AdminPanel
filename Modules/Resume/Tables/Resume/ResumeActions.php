<?php

namespace Modules\Resume\Tables\Resume;

use Yajra\DataTables\Html\Column;

class ResumeActions extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'actions', 'name'=> 'actions',  'title' => __('resume::resume.columns.actions'),
            'searchable' => false, 'orderable' => false, 'exportable' => false,
            'printable' => false, 'type' => 'html',
            'view' => 'resume::datatable.resume.actions', 'variable' => 'resume'
        ]));
    }

}
