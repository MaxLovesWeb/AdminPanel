<?php

namespace Modules\Account\Tables\Permissions;

use Modules\Account\Entities\Permission;
use Modules\Account\Tables\Roles\RoleActions;
use Modules\Account\Tables\Users\HasUsers;
use Modules\Template\Tables\AdminDatatable;
use Yajra\DataTables\Facades\DataTables;
use Modules\Account\Entities\User;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;

class PermissionDatatable extends AdminDatatable
{

    /**
     * Relations columns
     * @var array
     */
    protected $relations = [];

    //columns which must html render
    protected $rawColumns = [];

    // table id
    protected $tableId = 'permissions-dt';

    // Sorting and searching will only work
    // on columns explicitly defined as whitelist.
    protected $whiteList = ['name', 'email'];

    // Sorting and searching will not work
    // on columns explicitly defined as blacklisted.
    protected $blackList = [];

    /**
     * @var Column
     */
    protected $actions;

    /**
     * RoleDatatable constructor.
     */
    public function __construct()
    {
        $this->actions = new PermissionActions;
    }

    /**
     * @return Builder
     */
    public function getModelBuilder()
    {
        return Permission::query();
    }

    /**
     * @return HtmlBuilder
     */
    public function html()
    {
        return parent::html()->add($this->actions);
    }

    /**
     * @param Builder $source
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function ajax()
    {
        return DataTables::eloquent($this->query())
            /*->editColumn('roles', function(User $user) {
                return view('role::datatable.has-roles', ['roles' => $user->roles])->render();
            })
            ->editColumn('permissions', function(User $user) {
                return view('permission::datatable.has-permissions', ['permissions' => $user->permissions])->render();
            })*/
            ->editColumn($this->actions->name, function(Permission $permission) {
                return view($this->actions->view, [$this->actions->variable => $permission])->render();
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
                'data' => 'module', 'name'=> 'module', 'visible' => true,
                'title' => __('account::permissions.columns.module'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'name', 'name'=> 'name', 'visible' => true,
                'title' => __('account::permissions.columns.name'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'slug', 'name'=> 'slug', 'visible' => true,
                'title' => __('account::permissions.columns.slug'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'description', 'name'=> 'description', 'visible' => false,
                'title' => __('account::permissions.columns.description'),
                'searchable' => false, 'orderable' => false
            ],
            [
                'data' => 'created_at', 'name'=> 'created_at', 'visible' => false,
                'title' => __('account::permissions.columns.created_at'),
                'searchable' => false, 'orderable' => true,
            ],
            [
                'data' => 'updated_at', 'name'=> 'updated_at', 'visible' => false,
                'title' => __('account::permissions.columns.updated_at'),
                'searchable' => false, 'orderable' => true,
            ],
        ];
    }

}
