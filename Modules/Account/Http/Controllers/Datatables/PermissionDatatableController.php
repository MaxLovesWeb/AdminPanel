<?php

namespace Modules\Account\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use Modules\Account\Entities\Role;
use Modules\Account\Entities\User;
use Modules\Account\Tables\Permissions\PermissionDatatable;
use Modules\Account\Tables\Scopes\RolePermissions;
use Modules\Account\Tables\Scopes\UserPermissions;


class PermissionDatatableController extends Controller
{
    /**
     * @var PermissionDatatable
     */
    protected $datatable;

    /**
     * Create a new composer.
     *
     * @param PermissionDatatable $datatable
     */
    public function __construct(PermissionDatatable $datatable)
    {
        $this->datatable = $datatable;
    }

    /**
     * Get All Permissions
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function getAll()
    {
        return $this->datatable->getResponse();
    }

    /**
     * Get Permissions for given user
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function getUserPermissions(User $user)
    {
        $builder = $user->permissions()->getQuery();

        $resource = $this->datatable->setQueryBuilder($builder);

        return $resource->getResponse();
       // return $this->datatable->addScope(new UserPermissions($user))->getResponse();
    }

    /**
     * Get Permissions for given role
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function getRolePermissions(Role $role)
    {
        $builder = $role->permissions()->getQuery();

        $resource = $this->datatable->setQueryBuilder($builder);

        return $resource->getResponse();
       // return $this->datatable->addScope(new RolePermissions($role))->getResponse();
    }



}
