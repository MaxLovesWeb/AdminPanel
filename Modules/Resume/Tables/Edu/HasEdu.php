<?php

namespace Modules\Resume\Tables\Edu;

use Yajra\DataTables\Html\Column;

class HasEdu extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'educations', 'name'=> 'educations', 'visible' => true, 'title' => __('resume::edu.columns.educations'),
            'searchable' => true, 'orderable' => false, 'type' => 'html',
            'view' => 'resume::datatable.edu.has-education',
        ]));
    }

}
