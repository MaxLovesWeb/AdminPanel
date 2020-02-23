<?php

namespace Modules\Resume\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use Modules\Account\Entities\User;
use Modules\Resume\Tables\Resume\ResumeDatatable;

class ResumeDatatableController extends Controller
{

    /**
     * @var ResumeDatatable
     */
    protected $datatable;

    /**
     * UserDatatableController constructor.
     * @param ResumeDatatable $datatable
     */
    public function __construct(ResumeDatatable $datatable)
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
     * Get resume for given user
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserResume(User $user)
    {
        $builder = $user->resume()->getQuery();

        $resource = $this->datatable->setQueryBuilder($builder);

        return $resource->getResponse();
    }



}
