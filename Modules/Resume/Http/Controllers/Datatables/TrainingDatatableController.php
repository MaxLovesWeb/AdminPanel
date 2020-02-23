<?php

namespace Modules\Resume\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use Modules\Account\Entities\User;
use Modules\Resume\Entities\Resume;
use Modules\Resume\Tables\Experience\ExperienceDatatable;
use Modules\Resume\Tables\Resume\ResumeDatatable;
use Modules\Resume\Tables\Training\TrainingDatatable;

class TrainingDatatableController extends Controller
{

    /**
     * @var ResumeDatatable
     */
    protected $datatable;

    /**
     * UserDatatableController constructor.
     * @param TrainingDatatable $datatable
     */
    public function __construct(TrainingDatatable $datatable)
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
    public function getResumeTrainings(Resume $resume)
    {
        $builder = $resume->trainings()->getQuery();

        $resource = $this->datatable->setQueryBuilder($builder);

        return $resource->getResponse();
    }



}
