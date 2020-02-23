<?php

namespace Modules\Resume\Tables\Resume;

use Modules\Company\Entities\Company;
use Modules\Resume\Entities\Resume;
use Modules\Template\Tables\AdminDatatable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class ResumeDatatable extends AdminDatatable
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
    protected $tableId = 'resumes-dt';

    // Sorting and searching will only work
    // on columns explicitly defined as whitelist.
    protected $whiteList = [
        'title',
        'status',
        'letter',
        'optional',
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
        return Resume::query();
    }

    /**
     * CompanyDatatable constructor.
     */
    public function __construct()
    {
        $this->actions = new ResumeActions;
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
            ->editColumn($this->actions->name, function(Resume $resume) {
                return view($this->actions->view, [$this->actions->variable => $resume])->render();
            })
            ->editColumn('optional', function(Resume $resume) {
                return view('resume::datatable.resume.optional', compact('resume'))->render();
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
                'data' => 'id', 'name'=> 'id', 'visible' => false, 'title' => __('resume::resume.columns.id'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'title', 'name'=> 'title',  'title' => __('resume::resume.columns.title'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'status', 'name'=> 'status',  'title' => __('resume::resume.columns.status'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'letter', 'name'=> 'letter',  'title' => __('resume::resume.columns.letter'),
                'searchable' => false, 'orderable' => false
            ],
            [
                'data' => 'optional', 'name'=> 'optional',  'title' => __('resume::resume.columns.optional'),
                'searchable' => false, 'orderable' => false
            ],
            [
                'data' => 'created_at', 'name'=> 'created_at', 'visible' => false, 'title' => __('resume::resume.columns.created_at'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'updated_at', 'name'=> 'updated_at', 'visible' => false, 'title' => __('resume::resume.columns.updated_at'),
                'searchable' => false, 'orderable' => true
            ],
        ];
    }

}
