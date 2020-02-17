<?php

namespace Modules\Account\Tables\Roles;

use App\Tables\AdminDatatable;
use Modules\Account\Entities\Role;
use Modules\Account\Entities\User;
use Modules\Account\Tables\Permissions\HasPermissions;
use Modules\Account\Tables\Users\HasUsers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class RoleDatatable extends AdminDatatable
{
    /**
     * Relations columns
     * @var array
     */
    protected $relations = [
        'users', 'permissions'
    ];

    //columns which must html render
    protected $rawColumns = [];

    // table id
    protected $tableId = 'roles-dt';

    // Sorting and searching will only work
    // on columns explicitly defined as whitelist.
    protected $whiteList = ['name', 'slug'];

    // Sorting and searching will not work
    // on columns explicitly defined as blacklisted.
    protected $blackList = [];

    /**
     * @var Column
     */
    protected $permissions, $users, $actions;

    /**
     * @return Builder
     */
    public function getModelBuilder()
    {
        return Role::query();
    }

    /**
     * RoleDatatable constructor.
     */
    public function __construct()
    {
        $this->permissions = new HasPermissions;
        $this->users = new HasUsers;
        $this->actions = new RoleActions;
    }

    /**
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $html = parent::html()
                   ->add($this->permissions)
                      ->add($this->users)
                        ->add($this->actions);

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
            ->editColumn($this->permissions->name, function(Role $role) {
                return view($this->permissions->view, [$this->permissions->data => $role->permissions])->render();
            })
            ->editColumn($this->users->name, function(Role $role) {
                return view($this->users->view, [$this->users->data => $role->users])->render();
            })
            ->editColumn($this->actions->name, function(Role $role) {
                return view($this->actions->view, [$this->actions->variable => $role])->render();
            })
            ->rawColumns([
                $this->permissions->name,
                $this->users->name,
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
                'data' => 'id', 'name'=> 'id', 'visible' => false, 'title' => __('account::roles.columns.id'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'name', 'name'=> 'name',  'title' => __('account::roles.columns.name'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'slug', 'name'=> 'slug',  'title' => __('account::roles.columns.slug'),
                'searchable' => true, 'orderable' => true
            ],
            [
                'data' => 'created_at', 'name'=> 'created_at', 'visible' => false, 'title' => __('account::roles.columns.created_at'),
                'searchable' => false, 'orderable' => true
            ],
            [
                'data' => 'updated_at', 'name'=> 'updated_at', 'visible' => false, 'title' => __('account::roles.columns.updated_at'),
                'searchable' => false, 'orderable' => true
            ],
        ];
    }

}
