<?php

namespace Modules\Resume\Tables\Training;

use Yajra\DataTables\Html\Column;

class HasTraining extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'trainings', 'name'=> 'trainings', 'visible' => true, 'title' => __('resume::training.columns.experiences'),
            'searchable' => true, 'orderable' => false, 'type' => 'html',
            'view' => 'resume::datatable.training.has-trainings',
        ]));
    }

}
