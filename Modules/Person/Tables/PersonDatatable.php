<?php

namespace Modules\Person\Tables;

use Modules\Company\Entities\Company;
use Modules\Person\Entities\Person;
use Modules\Template\Tables\AdminDatatable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class PersonDatatable extends AdminDatatable
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
    protected $tableId = 'persons-dt';

    // Sorting and searching will only work
    // on columns explicitly defined as whitelist.
    protected $whiteList = [
        'first_name',
        'last_name',
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
        return Person::query();
    }

    /**
     * PersonDatatable constructor.
     */
    public function __construct()
    {
        $this->actions = new PersonActions;
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

            ->editColumn($this->actions->name, function(Person $person) {
                return view($this->actions->view, [$this->actions->variable => $person])->render();
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
                'data' => 'id', 'name'=> 'id', 'visible' => false, 'title' => __('person::person.columns.id'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'first_name', 'name'=> 'first_name',  'title' => __('person::person.columns.first_name'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'last_name', 'name'=> 'last_name',  'title' => __('person::person.columns.last_name'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'created_at', 'name'=> 'created_at', 'visible' => false, 'title' => __('person::person.columns.created_at'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'updated_at', 'name'=> 'updated_at', 'visible' => false, 'title' => __('person::person.columns.updated_at'),
                'searchable' => false, 'orderable' => true
            ],
        ];
    }

}
