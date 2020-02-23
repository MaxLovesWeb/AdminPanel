<?php

namespace Modules\Resume\Tables\Edu;

use Modules\Company\Entities\Company;
use Modules\Resume\Entities\Education;
use Modules\Resume\Entities\Resume;
use Modules\Resume\Tables\Edu\EduActions;
use Modules\Template\Tables\AdminDatatable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class EduDatatable extends AdminDatatable
{
    /**
     * Relations columns
     * @var array
     */
    protected $relations = [
       // 'users', 'permissions'
    ];

    //columns which must html render
    protected $rawColumns = [
        'optional'
    ];

    // table id
    protected $tableId = 'educations-dt';

    // Sorting and searching will only work
    // on columns explicitly defined as whitelist.
    protected $whiteList = [
        'description',
        'status',
        'start_date',
        'end_date',
    ];

    // Sorting and searching will not work
    // on columns explicitly defined as blacklisted.
    protected $blackList = [];

    /**
     * @var Column
     */
    protected $actions;

    /**
     * @return Builder
     */
    public function getModelBuilder()
    {
        return Education::query();
    }

    /**
     * CompanyDatatable constructor.
     */
    public function __construct()
    {
        $this->actions = new EduActions;
    }

    /**
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $html = parent::html()->add($this->actions);

        return $html;
    }

    /**
     * @param Builder $source
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function ajax()
    {
        return DataTables::eloquent($this->query())
            ->editColumn($this->actions->name, function(Education $education) {
                return view($this->actions->view, [$this->actions->variable => $education])->render();
            })
            ->rawColumns([
                $this->actions->name
            ])
            ->whitelist($this->whiteList)->make(true);
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        return [
            [
                'data' => 'id', 'name'=> 'id', 'visible' => false, 'title' => __('resume::edu.columns.id'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'description', 'name'=> 'description',  'title' => __('resume::edu.columns.description'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'status', 'name'=> 'status',  'title' => __('resume::edu.columns.status'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'start_date', 'name'=> 'start_date',  'title' => __('resume::edu.columns.start_date'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'end_date', 'name'=> 'end_date',  'title' => __('resume::edu.columns.end_date'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'created_at', 'name'=> 'created_at', 'visible' => false, 'title' => __('resume::edu.columns.created_at'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'updated_at', 'name'=> 'updated_at', 'visible' => false, 'title' => __('resume::edu.columns.updated_at'),
                'searchable' => false, 'orderable' => true
            ],
        ];
    }

}
