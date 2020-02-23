<?php

namespace Modules\Person\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use Modules\Person\Tables\PersonDatatable;

class PersonDatatableController extends Controller
{

    /**
     * @var PersonDatatable
     */
    protected $datatable;

    /**
     * UserDatatableController constructor.
     * @param PersonDatatable $datatable
     */
    public function __construct(PersonDatatable $datatable)
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




}
