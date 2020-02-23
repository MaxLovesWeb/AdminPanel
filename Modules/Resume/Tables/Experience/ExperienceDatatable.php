<?php

namespace Modules\Resume\Tables\Experience;

use Modules\Company\Entities\Company;
use Modules\Resume\Entities\Experience;
use Modules\Resume\Entities\Resume;
use Modules\Template\Tables\AdminDatatable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class ExperienceDatatable extends AdminDatatable
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
    protected $tableId = 'experiences-dt';

    // Sorting and searching will only work
    // on columns explicitly defined as whitelist.
    protected $whiteList = [
        'title',
        'description',
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
        return Experience::query();
    }

    /**
     * CompanyDatatable constructor.
     */
    public function __construct()
    {
        $this->actions = new ExperienceActions();
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
            ->editColumn($this->actions->name, function(Experience $experience) {
                return view($this->actions->view, [$this->actions->variable => $experience])->render();
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
                'data' => 'id', 'name'=> 'id', 'visible' => false, 'title' => __('resume::experience.columns.id'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'description', 'name'=> 'description',  'title' => __('resume::experience.columns.description'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'title', 'name'=> 'title',  'title' => __('resume::experience.columns.title'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'start_date', 'name'=> 'start_date',  'title' => __('resume::experience.columns.start_date'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'end_date', 'name'=> 'end_date',  'title' => __('resume::experience.columns.end_date'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'created_at', 'name'=> 'created_at', 'visible' => false, 'title' => __('resume::experience.columns.created_at'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'updated_at', 'name'=> 'updated_at', 'visible' => false, 'title' => __('resume::experience.columns.updated_at'),
                'searchable' => false, 'orderable' => true
            ],
        ];
    }

}
