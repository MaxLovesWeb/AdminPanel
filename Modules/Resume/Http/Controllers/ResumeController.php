<?php

namespace Modules\Resume\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Account\Entities\User;
use Modules\Account\Events\Roles\RoleDeleted;
use Modules\Addresses\Events\AddressCreated;
use Modules\Addresses\Http\Requests\AddressFormRequest;
use Modules\Addresses\Tables\AddressDatatable;
use Modules\Company\Entities\Company;
use Modules\Company\Events\CompanyDeleting;
use Modules\Contact\Forms\CreateContact;
use Modules\Contact\Tables\ContactDatatable;
use Modules\Person\Forms\ShowPerson;
use Modules\Resume\Entities\Resume;
use Modules\Resume\Events\Education\EducationCreated;
use Modules\Resume\Events\Training\TrainingCreated;
use Modules\Resume\Events\Experience\ExperienceCreated;
use Modules\Resume\Events\Resume\ResumeCreated;
use Modules\Resume\Events\Resume\ResumeCreating;
use Modules\Resume\Events\Resume\ResumeEditing;
use Modules\Resume\Events\Resume\ResumeUpdated;
use Modules\Resume\Events\Resume\ResumeViewed;
use Modules\Resume\Forms\Edu\CreateEdu;
use Modules\Resume\Forms\Experience\CreateExperience;
use Modules\Resume\Forms\Resume\CreateResume;
use Modules\Resume\Forms\Resume\EditResume;
use Modules\Resume\Forms\Resume\ShowResume;
use Modules\Resume\Forms\Training\CreateTraining;
use Modules\Resume\Http\Requests\EducationFormRequest;
use Modules\Resume\Http\Requests\ExperienceFormRequest;
use Modules\Resume\Http\Requests\ResumeFormRequest;
use Modules\Resume\Http\Requests\TrainingFormRequest;
use Modules\Resume\Tables\Edu\EduDatatable;
use Modules\Resume\Tables\Experience\ExperienceDatatable;
use Modules\Resume\Tables\Resume\ResumeDatatable;
use Modules\Resume\Tables\Training\TrainingDatatable;

class ResumeController extends Controller
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
     * @param ResumeDatatable $resumeTable
     * @return \Illuminate\View\View
     */
    public function index(ResumeDatatable $resumeTable)
    {
        $datatables = [
            'resume' => $resumeTable->html()->buttons(['create'])->ajax([
                'url' => route('datatables.resume.index')
            ]),
        ];

        return view('resume::index', compact( 'datatables'));
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
    public function show(Resume $resume)
    {

        // use presenter
        // experience order by start date desc
        // start date presenter

        event(new ResumeViewed($resume));

        return view('resume::show', compact('resume'));
    }

    /**
     * Show the form for editing.
     *
     * @param Resume $resume
     * @param EduDatatable $eduDatatable
     * @param ExperienceDatatable $experienceDatatable
     * @param TrainingDatatable $trainingDatatable
     * @param AddressDatatable $addressDatatable
     * @param ContactDatatable $contactDatatable
     * @return Response
     */
    public function edit(Resume $resume, EduDatatable $eduDatatable,
                            ExperienceDatatable $experienceDatatable,
                                TrainingDatatable $trainingDatatable,
                                    AddressDatatable $addressDatatable,
                                        ContactDatatable $contactDatatable)
    {
        $forms = [
            'resume' => $this->form(EditResume::class, [
                'model' => $resume,
                'method' => 'PUT',
                'url' => route('resume.update', $resume),
            ]),
            'edu' => $this->form(CreateEdu::class, [
                //'model' => $resume,
                'method' => 'POST',
                'url' => route('educations.store', $resume),
            ]),
            'experience' => $this->form(CreateExperience::class, [
                //'model' => $resume,
                'method' => 'POST',
                'url' => route('experiences.store', $resume),
            ]),
            'training' => $this->form(CreateTraining::class, [
                //'model' => $resume,
                'method' => 'POST',
                'url' => route('trainings.store', $resume),
            ]),
            'person' => $this->form(ShowPerson::class, [
                'model' => $resume->person
            ]),
            'contact' => $this->form(CreateContact::class),
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
            'addresses' => $addressDatatable->html()->ajax([
                'url' => route('datatables.persons.addresses', ['person' => $resume->person])
            ]),
            'contacts' => $contactDatatable->html()->ajax([
                'url' => route('datatables.persons.contacts', ['person' => $resume->person])
            ]),
        ];

        event(new ResumeEditing($resume));

        return view('resume::edit', compact('resume', 'forms', 'datatables'));
    }

    /**
     *
     * @param Resume $resume
     * @param EducationFormRequest $request
     * @return Response
     */
    public function addEducation(Resume $resume, EducationFormRequest $request)
    {
        $data = $request->validated();

        $company = $this->addCompany($data);

        $education = $resume->educations()->create(
            array_merge($data, ['company_id' => $company->getKey()])
        );

        event(new EducationCreated($education));

        flash(trans('create-education-success'))->success()->important();

        return redirect()->route('resume.edit', $resume);
    }

    /**
     * Add Company from request
     * @param array $data
     * @return mixed
     */
    protected function addCompany(array $data)
    {
        $company = Company::firstOrCreate(
            ['name' => $data['company']],
            ['slug' => $data['company']]
        );

        unset($data['company']);

        return $company;
    }

    /**
     *
     * @param Resume $resume
     * @param ExperienceFormRequest $request
     * @return Response
     */
    public function addExperience(Resume $resume, ExperienceFormRequest $request)
    {
        $data = $request->validated();

        $company = $this->addCompany($data);

        $experience = $resume->experiences()->create(
            array_merge($data, ['company_id' => $company->getKey()])
        );

        event(new ExperienceCreated($experience));

        flash(trans('create-experience-success'))->success()->important();

        return redirect()->route('resume.edit', $resume);
    }

    /**
     *
     * @param Resume $resume
     * @param TrainingFormRequest $request
     * @return Response
     */
    public function addTraining(Resume $resume, TrainingFormRequest $request)
    {

        $data = $request->validated();

        $company = $this->addCompany($data);

        $training = $resume->trainings()->create(
            array_merge($data, ['company_id' => $company->getKey()])
        );

        event(new TrainingCreated($training));

        flash(trans('create-training-success'))->success()->important();

        return redirect()->route('resume.edit', $resume);
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
     *
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
