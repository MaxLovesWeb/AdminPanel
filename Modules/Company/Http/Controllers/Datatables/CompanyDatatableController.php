<?php

namespace Modules\Company\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use Modules\Account\Entities\User;
use Modules\Company\Tables\CompanyDatatable;

class CompanyDatatableController extends Controller
{

    /**
     * @var CompanyDatatable
     */
    protected $datatable;

    /**
     * UserDatatableController constructor.
     * @param CompanyDatatable $datatable
     */
    public function __construct(CompanyDatatable $datatable)
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
