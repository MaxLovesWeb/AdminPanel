<?php

namespace Modules\Resume\Tables\Experience;

use Yajra\DataTables\Html\Column;

class HasExperience extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'experiences', 'name'=> 'experiences', 'visible' => true, 'title' => __('resume::resume.columns.experiences'),
            'searchable' => true, 'orderable' => false, 'type' => 'html',
            'view' => 'resume::datatable.experience.has-experience',
        ]));
    }

}
