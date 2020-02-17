<?php

namespace Modules\Addresses\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use Modules\Account\Entities\Permission;
use Modules\Account\Entities\User;
use Modules\Account\Tables\Roles\RoleDatatable;
use Modules\Account\Tables\Scopes\UserRoles;
use Modules\Addresses\Tables\AddressDatatable;

class AddressDatatableController extends Controller
{

    /**
     * @var RoleDatatable
     */
    protected $datatable;

    /**
     * UserDatatableController constructor.
     * @param AddressDatatable $datatable
     */
    public function __construct(AddressDatatable $datatable)
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
    public function getUserAddresses(User $user)
    {
        $builder = $user->addresses()->getQuery();

        $resource = $this->datatable->setQueryBuilder($builder);

        return $resource->getResponse();
    }


}
