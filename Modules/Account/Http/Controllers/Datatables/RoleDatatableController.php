<?php

namespace Modules\Account\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use Modules\Account\Entities\Permission;
use Modules\Account\Entities\User;
use Modules\Account\Tables\Roles\RoleDatatable;
use Modules\Account\Tables\Scopes\UserRoles;

class RoleDatatableController extends Controller
{

    /**
     * @var RoleDatatable
     */
    protected $datatable;

    /**
     * UserDatatableController constructor.
     * @param RoleDatatable $datatable
     */
    public function __construct(RoleDatatable $datatable)
    {
        $this->datatable = $datatable;
    }

    /**
     * Get All Role Datatables Response
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function getAll()
    {
        return $this->datatable->getResponse();
    }

    /**
     * Get roles for given user
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserRoles(User $user)
    {
        $builder = $user->roles()->getQuery();

        $resource = $this->datatable->setQueryBuilder($builder);

        return $resource->getResponse();
    }

    /**
     * Get roles for given permission
     * @param Permission $permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPermissionRoles(Permission $permission)
    {
        $builder = $permission->roles()->getQuery();

        $resource = $this->datatable->setQueryBuilder($builder);

        return $resource->getResponse();
    }




}
