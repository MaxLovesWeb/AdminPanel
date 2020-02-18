<?php

namespace Modules\Template\Tables;

use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable as DataTableService;
use Illuminate\Database\Eloquent\Builder;

abstract class AdminDatatable extends DataTableService
{
    /**
     * @var Builder
     */
    protected $queryBuilder;

    /**
     * Relations columns
     * @var array
     */
    protected $relations = [];

    //columns which must html render
    protected $rawColumns = [];

    // table id
    protected $tableId;

    // Sorting and searching will only work
    // on columns explicitly defined as whitelist.
    protected $whiteList = [];

    // Sorting and searching will not work
    // on columns explicitly defined as blacklisted.
    protected $blackList = [];

    /**
     * @param Builder $queryBuilder
     * @return AdminDatatable
     */
    public function setQueryBuilder(Builder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;

        return $this;
    }

    /**
     * @return Builder
     */
    public function getQueryBuilder()
    {
        return $this->queryBuilder;
    }

    /**
     * @return Builder
     */
    abstract public function getModelBuilder();


    /**
     * Get columns definitions
     * @return array
     */
    abstract public function getColumns();


    /**
     * Apply Builder.
     * @return Builder
     */
    public function query()
    {
        $builder = $this->getQueryBuilder() ?? $this->getModelBuilder();

        return $this->applyScopes($builder->with($this->relations));
    }

    /**
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId($this->tableId)
            ->columns($this->getColumns())
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Datatable Server Side Response
     * @return \Illuminate\Http\JsonResponse
     */
    public function getResponse()
    {
        if ($action = $this->request()->get('action') and in_array($action, $this->actions)) {
            if ($action == 'print') {
                return app()->call([$this, 'printPreview']);
            }

            return app()->call([$this, $action]);
        }

        if ($this->request()->ajax() && $this->request()->wantsJson()) {
            return app()->call([$this, 'ajax']);
        }

        // ?
        return response()->json(null, 404);
    }

}
