<?php

namespace Modules\Resume\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Account\Entities\User;
use Modules\Account\Events\Roles\RoleDeleted;
use Modules\Account\Tables\Users\UserDatatable;
use Modules\Addresses\Events\AddressCreated;
use Modules\Addresses\Http\Requests\AddressFormRequest;
use Modules\Addresses\Tables\AddressDatatable;
use Modules\Company\Entities\Company;
use Modules\Company\Events\CompanyDeleting;
use Modules\Resume\Entities\Resume;
use Modules\Resume\Events\Resume\ResumeCreated;
use Modules\Resume\Events\Resume\ResumeCreating;
use Modules\Resume\Events\Resume\ResumeEditing;
use Modules\Resume\Events\Resume\ResumeUpdated;
use Modules\Resume\Events\Resume\ResumeViewed;
use Modules\Resume\Forms\Edu\CreateEdu;
use Modules\Resume\Forms\Edu\EditEdu;
use Modules\Resume\Forms\Experience\CreateExperience;
use Modules\Resume\Forms\Resume\CreateResume;
use Modules\Resume\Forms\Resume\EditResume;
use Modules\Resume\Forms\Resume\ShowResume;
use Modules\Resume\Forms\Training\CreateTraining;
use Modules\Resume\Http\Requests\ResumeFormRequest;
use Modules\Resume\Tables\Edu\EduDatatable;
use Modules\Resume\Tables\Experience\ExperienceDatatable;
use Modules\Resume\Tables\Resume\ResumeDatatable;
use Modules\Resume\Tables\Training\TrainingDatatable;

class TrainingController extends Controller
{
    use FormBuilderTrait;

    /**
     * RoleController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        //$this->authorizeResource(Resume::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param EduDatatable $eduTable
     * @return \Illuminate\View\View
     */
    public function index(EduDatatable $eduTable)
    {
        $datatables = [
            'resume' => $eduTable->html()->buttons(['create'])->ajax([
                'url' => route('datatables.educations.index')
            ]),
        ];

        return view('resume::edu.index', compact( 'datatables'));
    }

    /**
     * Display the specified resource.
     *
     * @param Resume $resume
     * @param EduDatatable $eduDatatable
     * @param ExperienceDatatable $experienceDatatable
     * @param TrainingDatatable $trainingDatatable
     * @return Response
     */
    public function show(Resume $resume,
                         EduDatatable $eduDatatable,
                         ExperienceDatatable $experienceDatatable,
                         TrainingDatatable $trainingDatatable)
    {

        $forms = [
            'resume' => $this->form(ShowResume::class, [
                'model' => $resume
            ]),
        ];

        $datatables = [
            'educations' => $eduDatatable->html()->ajax([
                'url' => route('datatables.resume.educations', $resume)
            ]),
            'experiences' => $experienceDatatable->html()->ajax([
                'url' => route('datatables.resume.experiences', $resume)
            ]),
            'trainings' => $trainingDatatable->html()->ajax([
                'url' => route('datatables.resume.trainings', $resume)
            ]),
        ];

        event(new ResumeViewed($resume));

        return view('resume::show', compact('resume', 'forms', 'datatables'));
    }

    /**
     * Show the form for editing.
     *
     * @param Resume $resume
     * @param EduDatatable $eduDatatable
     * @param ExperienceDatatable $experienceDatatable
     * @param TrainingDatatable $trainingDatatable
     * @return Response
     */
    public function edit(Resume $resume, EduDatatable $eduDatatable,
                         ExperienceDatatable $experienceDatatable,
                         TrainingDatatable $trainingDatatable)
    {
        $forms = [
            'resume' => $this->form(EditResume::class, [
                'model' => $resume,
                'method' => 'PUT',
                'url' => route('resume.update', $resume),
            ]),
            'edu' => $this->form(CreateEdu::class, [
                'model' => $resume,
                'method' => 'POST',
                'url' => route('educations.create', $resume),
            ]),
            'experience' => $this->form(CreateExperience::class, [
                'model' => $resume,
                'method' => 'POST',
                'url' => route('experiences.create', $resume),
            ]),
            'training' => $this->form(CreateTraining::class, [
                'model' => $resume,
                'method' => 'POST',
                'url' => route('trainings.create', $resume),
            ]),

        ];

        $datatables = [
            'educations' => $eduDatatable->html()->ajax([
                'url' => route('datatables.resume.educations', $resume)
            ]),
            'experiences' => $experienceDatatable->html()->ajax([
                'url' => route('datatables.resume.experiences', $resume)
            ]),
            'trainings' => $trainingDatatable->html()->ajax([
                'url' => route('datatables.resume.trainings', $resume)
            ]),
        ];

        event(new ResumeEditing($resume));

        return view('resume::edit', compact('resume', 'forms', 'datatables'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param User $user
     * @param ResumeDatatable $resumeTable
     * @return Response
     */
    public function create(User $user, ResumeDatatable $resumeTable)
    {
        $forms = [
            'resume' => $this->form(CreateResume::class, [
                'method' => 'POST',
                'url' => route('resume.store', $user),
            ]),
        ];

        $datatables = [
            'resume' => $resumeTable->html()->ajax([
                'url' => route('datatables.users.resume', $user)
            ]),
        ];

        event(new ResumeCreating($user));

        return view('resume::create', compact('forms', 'datatables'));
    }

    /**
     * Store a newly created resource in storage.
     * @param User $user
     * @param ResumeFormRequest $request
     * @return Response
     */
    public function store(User $user, ResumeFormRequest $request)
    {

        $resume = $user->resume()->create($request->validated());

        event(new ResumeCreated($resume));

        flash(trans('create-resume-success'))->success()->important();

        return redirect()->route('resume.edit', $resume);
    }


    /**
     * Update Company.
     *
     * @param Resume $resume
     * @param ResumeFormRequest $request
     * @return Response
     */
    public function update(Resume $resume, ResumeFormRequest $request)
    {
        $resume->fill($request->validated())->save();

        event(new ResumeUpdated($resume));

        flash(trans('update-resume-success'))->success()->important();

        return redirect()->route('resume.edit', $resume);
    }

    /**
     * Create One Address if Addressable.
     * @param Company $company
     * @param AddressFormRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function createAddress(Company $company, AddressFormRequest $request)
    {
        //dd($request->validated());
        $address = $company->addresses()->create($request->validated());

        flash(trans('create-address-success'))->success()->important();

        event(new AddressCreated($address));

        return redirect()->route('companies.edit', $company);
    }







    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function destroy(Company $company, Request $request)
    {
        event(new CompanyDeleting($company));

        $company->delete();

        flash(trans('delete-company-success'))->success()->important();

        event(new RoleDeleted);

        return redirect()->route('companies.index');
    }

}
