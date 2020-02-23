<?php

namespace Modules\Contact\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use Modules\Account\Entities\User;
use Modules\Company\Tables\CompanyDatatable;
use Modules\Contact\Entities\Contact;
use Modules\Contact\Tables\ContactDatatable;
use Modules\Person\Entities\Person;

class ContactDatatableController extends Controller
{

    /**
     * @var CompanyDatatable
     */
    protected $datatable;

    /**
     * UserDatatableController constructor.
     * @param ContactDatatable $datatable
     */
    public function __construct(ContactDatatable $datatable)
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
     *
     * @param Person $person
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPersonContacts(Person $person)
    {
        $builder = $person->contacts()->getQuery();

        $resource = $this->datatable->setQueryBuilder($builder);

        return $resource->getResponse();
    }





}
