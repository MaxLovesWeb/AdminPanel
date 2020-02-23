<?php

namespace Modules\Resume\Tables\Resume;

use Yajra\DataTables\Html\Column;

class HasResume extends Column
{

    /**
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct(array_merge($attributes, [
            'data' => 'resume', 'name'=> 'resume', 'visible' => true, 'title' => __('resume::resume.columns.resumes'),
            'searchable' => true, 'orderable' => false, 'type' => 'html',
            'view' => 'resume::datatable.resume.has-resume',
        ]));
    }

}
