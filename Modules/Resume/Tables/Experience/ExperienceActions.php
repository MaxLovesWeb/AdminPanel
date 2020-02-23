<?php

namespace Modules\Resume\Tables\Experience;

use Yajra\DataTables\Html\Column;

class ExperienceActions extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'actions', 'name'=> 'actions',  'title' => __('resume::experience.columns.actions'),
            'searchable' => false, 'orderable' => false, 'exportable' => false,
            'printable' => false, 'type' => 'html',
            'view' => 'resume::datatable.experience.actions', 'variable' => 'experience'
        ]));
    }

}
