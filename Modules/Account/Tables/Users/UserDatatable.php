<?php

namespace Modules\Account\Tables\Users;

use Modules\Account\Tables\Permissions\HasPermissions;
use Modules\Account\Tables\Roles\HasRoles;
use Modules\Template\Tables\AdminDatatable;
use Yajra\DataTables\Facades\DataTables;
use Modules\Account\Entities\User;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class UserDatatable extends AdminDatatable
{
    /**
     * Relations columns
     * @var array
     */
    protected $relations = [
        'roles', 'permissions'
    ];

    //columns which must html render
    protected $rawColumns = [];

    // table id
    protected $tableId = 'users-dt';

    // Sorting and searching will only work
    // on columns explicitly defined as whitelist.
    protected $whiteList = ['name', 'email'];

    // Sorting and searching will not work
    // on columns explicitly defined as blacklisted.
    //protected $blackList = [];

    /**
     * @var Column
     */
    protected $permissions, $roles, $actions;

    /**
     * RoleDatatable constructor.
     */
    public function __construct()
    {
        $this->actions = new UserActions;
        $this->permissions = new HasPermissions;
        $this->roles = new HasRoles;
    }

    /**
     * @return Builder
     */
    public function getModelBuilder()
    {
        return User::query();
    }

    /**
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return parent::html()
            ->add($this->roles)
            ->add($this->permissions)
            ->add($this->actions);
    }

    /**
     * @param Builder $source
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function ajax()
    {
        return DataTables::eloquent($this->query())
            ->editColumn($this->actions->name, function (User $user) {
                return view($this->actions->view, [$this->actions->variable => $user])->render();
            })
            ->editColumn($this->roles->name, function (User $user) {
                return view($this->roles->view, [$this->roles->data => $user->roles])->render();
            })
            ->editColumn($this->permissions->name, function (User $user) {
                return view($this->permissions->view, [$this->permissions->data => $user->permissions])->render();
            })
            ->rawColumns([
                $this->permissions->name,
                $this->roles->name,
                $this->actions->name
            ])->whitelist($this->whiteList)->make(true);
    }

    /**
     * Get columns definitions
     * @return array
     */
    public function getColumns()
    {
        return [
            [
                'data' => 'id', 'name' => 'id', 'visible' => true, 'title' => __('account::users.columns.id'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'name', 'name' => 'name', 'title' => __('account::users.columns.name'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'email', 'name' => 'email', 'title' => __('account::users.columns.email'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'created_at', 'name' => 'created_at', 'visible' => false, 'title' => __('account::users.columns.created_at'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'updated_at', 'name' => 'updated_at', 'visible' => false, 'title' => __('account::users.columns.updated_at'),
                'searchable' => false, 'orderable' => true
            ],

        ];
    }


}
