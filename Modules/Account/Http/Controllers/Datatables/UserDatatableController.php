<?php

namespace Modules\Account\Http\Controllers\Datatables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Account\Entities\Permission;
use Modules\Account\Entities\Role;
use Modules\Account\Tables\Scopes\UserDataTableFilter;
use Modules\Account\Tables\Users\UserDatatable;

class UserDatatableController extends Controller
{
    /**
     * @var UserDatatable
     */
    protected $datatable;

    /**
     * UserDatatableController constructor.
     * @param UserDatatable $datatable
     */
    public function __construct(UserDatatable $datatable)
    {
        $this->datatable = $datatable;
    }

    /**
     * Get All Users Datatables Response
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll(Request $request)
    {
        return $this->datatable->addScope(new UserDataTableFilter)->getResponse();
    }

    /**
     * Get roles for given user
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRoleUsers(Role $role)
    {
        $builder = $role->users()->getQuery();

        $resource = $this->datatable->setQueryBuilder($builder);

        return $resource->getResponse();
    }

    /**
     * Get users for given permission
     * @param Permission $permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPermissionUsers(Permission $permission)
    {
        $builder = $permission->users()->getQuery();

        $resource = $this->datatable->setQueryBuilder($builder);

        return $resource->getResponse();
    }




}
