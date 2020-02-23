<?php

namespace Modules\Resume\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use Modules\Account\Entities\User;
use Modules\Resume\Entities\Resume;
use Modules\Resume\Tables\Edu\EduDatatable;
use Modules\Resume\Tables\Resume\ResumeDatatable;

class EduDatatableController extends Controller
{

    /**
     * @var ResumeDatatable
     */
    protected $datatable;

    /**
     * UserDatatableController constructor.
     * @param EduDatatable $datatable
     */
    public function __construct(EduDatatable $datatable)
    {
        $this->datatable = $datatable;
    }

    /**
     * Get All Resume Datatables Response
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function getAll()
    {
        return $this->datatable->getResponse();
    }

    /**
     * Get edu for given resume
     * @param Resume $resume
     * @return \Illuminate\Http\JsonResponse
     */
    public function getResumeEducations(Resume $resume)
    {
        $builder = $resume->educations()->getQuery();

        $resource = $this->datatable->setQueryBuilder($builder);

        return $resource->getResponse();
    }



}
