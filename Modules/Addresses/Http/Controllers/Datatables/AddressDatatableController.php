<?php

namespace Modules\Addresses\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use Modules\Account\Entities\Permission;
use Modules\Account\Entities\User;
use Modules\Account\Tables\Roles\RoleDatatable;
use Modules\Account\Tables\Scopes\UserRoles;
use Modules\Addresses\Tables\AddressDatatable;
use Modules\Company\Entities\Company;
use Modules\Person\Entities\Person;

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
     * Get All addresses Datatables Response
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function getAll()
    {
        return $this->datatable->getResponse();
    }

    /**
     * Get addresses for given user
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserAddresses(User $user)
    {
        $builder = $user->addresses()->getQuery();

        $resource = $this->datatable->setQueryBuilder($builder);

        return $resource->getResponse();
    }

    /**
     * Get addresses for given company
     * @param Company $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCompanyAddresses(Company $company)
    {
        $builder = $company->addresses()->getQuery();

        $resource = $this->datatable->setQueryBuilder($builder);

        return $resource->getResponse();
    }

    /**
     * Get addresses for given company
     * @param Person $person
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPersonAddresses(Person $person)
    {
        $builder = $person->addresses()->getQuery();

        $resource = $this->datatable->setQueryBuilder($builder);

        return $resource->getResponse();
    }


}
