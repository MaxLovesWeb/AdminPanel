<?php

namespace Modules\Company\Tables;

use Modules\Company\Entities\Company;
use Modules\Template\Tables\AdminDatatable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class CompanyDatatable extends AdminDatatable
{
    /**
     * Relations columns
     * @var array
     */
    protected $relations = [
       // 'users', 'permissions'
    ];

    //columns which must html render
    protected $rawColumns = [];

    // table id
    protected $tableId = 'companies-dt';

    // Sorting and searching will only work
    // on columns explicitly defined as whitelist.
    protected $whiteList = [
        'name',
        'slug'
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
        return Company::query();
    }

    /**
     * CompanyDatatable constructor.
     */
    public function __construct()
    {
        $this->actions = new CompanyActions;
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

            ->editColumn($this->actions->name, function(Company $company) {
                return view($this->actions->view, [$this->actions->variable => $company])->render();
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
                'data' => 'id', 'name'=> 'id', 'visible' => false, 'title' => __('company::company.columns.id'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'name', 'name'=> 'name',  'title' => __('company::company.columns.name'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'slug', 'name'=> 'slug',  'title' => __('company::company.columns.slug'),
                'searchable' => true, 'orderable' => false
            ],

            [
                'data' => 'created_at', 'name'=> 'created_at', 'visible' => false, 'title' => __('company::company.columns.created_at'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'updated_at', 'name'=> 'updated_at', 'visible' => false, 'title' => __('company::company.columns.updated_at'),
                'searchable' => false, 'orderable' => true
            ],
        ];
    }

}
