<?php

namespace Modules\Person\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Account\Entities\User;
use Modules\Account\Events\Roles\RoleDeleted;
use Modules\Account\Forms\Users\ShowUser;
use Modules\Account\Tables\Users\UserDatatable;
use Modules\Addresses\Events\AddressCreated;
use Modules\Addresses\Forms\CreateAddress;
use Modules\Addresses\Http\Requests\AddressFormRequest;
use Modules\Addresses\Tables\AddressDatatable;
use Modules\Company\Entities\Company;
use Modules\Company\Events\CompanyCreated;
use Modules\Company\Events\CompanyCreating;
use Modules\Company\Events\CompanyDeleting;
use Modules\Company\Events\CompanyEditing;
use Modules\Company\Events\CompanyUpdated;
use Modules\Company\Events\CompanyViewed;
use Modules\Company\Forms\CreateCompany;
use Modules\Company\Forms\EditCompany;
use Modules\Company\Forms\ShowCompany;
use Modules\Company\Http\Requests\CompanyFormRequest;
use Modules\Company\Tables\CompanyDatatable;
use Modules\Person\Entities\Person;
use Modules\Person\Events\PersonCreated;
use Modules\Person\Events\PersonCreating;
use Modules\Person\Events\PersonDeleted;
use Modules\Person\Events\PersonDeleting;
use Modules\Person\Events\PersonEditing;
use Modules\Person\Events\PersonUpdated;
use Modules\Person\Events\PersonViewed;
use Modules\Person\Forms\CreatePerson;
use Modules\Person\Forms\EditPerson;
use Modules\Person\Forms\ShowPerson;
use Modules\Person\Http\Requests\PersonFormRequest;
use Modules\Person\Tables\PersonDatatable;


class PersonController extends Controller
{
    use FormBuilderTrait;

    /**
     * PersonController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        //$this->authorizeResource(Person::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param PersonDatatable $personTable
     * @return \Illuminate\View\View
     */
    public function index(PersonDatatable $personTable)
    {
        $datatables = [
            'persons' => $personTable->html()->buttons(['create'])->ajax([
                'url' => route('datatables.persons.index')
            ]),
        ];

        return view('person::index', compact( 'datatables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param User $user
     * @return Response
     */
    public function create(User $user)
    {
        $forms = [
            'person' => $this->form(CreatePerson::class, [
                'method' => 'POST',
                'url' => route('persons.store', $user),
            ]),
        ];

        event(new PersonCreating);

        return view('person::create', compact('forms'));
    }

    /**
     * Store a newly created resource in storage.
     * @param User $user
     * @param PersonFormRequest $request
     * @return Response
     */
    public function store(User $user, PersonFormRequest $request)
    {
        $data = $request->validated();

        $person = $user->person()->create($request->validated());

        event(new PersonCreated($person));

        flash(trans('create-person-success'))->success()->important();

        return redirect()->route('users.edit', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @param AddressDatatable $addressDatatable
     * @return Response
     */
    public function show(User $user, AddressDatatable $addressDatatable)
    {
        $person = $user->person;

        $forms = [
            'person' => $this->form(ShowPerson::class, [
                'model' => $person,
            ]),
            'user' => $this->form(ShowUser::class, [
                'model' => $user,
            ]),
        ];

        $datatables = [
            'addresses' => $addressDatatable->html()->ajax([
                'url' => route('datatables.persons.addresses', $person)
            ]),
        ];

        event(new PersonViewed($person));

        return view('person::show', compact('person', 'forms', 'datatables'));
    }

    /**
     * Show the form for editing Person.
     *
     * @param Person $person
     * @param AddressDatatable $addressDatatable
     * @return Response
     */
    public function edit(Person $person, AddressDatatable $addressDatatable)
    {
        $forms = [
            'person' => $this->form(EditPerson::class, [
                'model' => $person,
                'method' => 'PUT',
                'url' => route('persons.update', $person),
            ]),
            'user' => $this->form(ShowUser::class, [
                'model' => $person->user,
            ]),
            'createAddress' => $this->form(CreateAddress::class, [
                'model' => $person,
                'method' => 'POST',
                'url' => route('persons.createAddress', $person),
            ]),
        ];

        $datatables = [
            'addresses' => $addressDatatable->html()->ajax([
                'url' => route('datatables.persons.addresses', $person)
            ]),
        ];

        event(new PersonEditing($person));

        return view('person::edit', compact('person', 'forms', 'datatables'));
    }

    /**
     * Create One Address if Addressable.
     * @param Person $person
     * @param AddressFormRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function createAddress(Person $person, AddressFormRequest $request)
    {
        //dd($request->validated());
        $address = $person->addresses()->create($request->validated());

        flash(trans('create-address-success'))->success()->important();

        event(new AddressCreated($address));

        return redirect()->route('persons.edit', $person);
    }

    /**
     * Update Company.
     *
     * @param Person $person
     * @param PersonFormRequest $request
     * @return Response
     */
    public function update(Person $person, PersonFormRequest $request)
    {
        $person->fill($request->validated())->save();

        event(new PersonUpdated($person));

        flash(trans('update-person-success'))->success()->important();

        return redirect()->route('persons.edit', $person);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Person $person
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function destroy(Person $person, Request $request)
    {
        event(new PersonDeleting($person));

        $person->delete();

        flash(trans('delete-person-success'))->success()->important();

        event(new PersonDeleted);

        return redirect()->route('persons.index');
    }

}
