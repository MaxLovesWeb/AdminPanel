<?php

namespace Modules\Company\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Account\Entities\User;
use Modules\Account\Events\Roles\RoleDeleted;
use Modules\Account\Forms\Users\SyncUsers;
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


class CompanyController extends Controller
{
    use FormBuilderTrait;

    /**
     * RoleController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->authorizeResource(Company::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param CompanyDatatable $companyTable
     * @return \Illuminate\View\View
     */
    public function index(CompanyDatatable $companyTable)
    {
        $datatables = [
            'companies' => $companyTable->html()->buttons(['create'])->ajax([
                'url' => route('datatables.companies.index')
            ]),
        ];

        return view('company::index', compact( 'datatables'));
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @param UserDatatable $userTable
     * @return Response
     */
    public function show(Company $company, UserDatatable $userTable, AddressDatatable $addressDatatable)
    {

        $form = $this->form(ShowCompany::class, [
            'model' => $company
        ]);

        $datatables = [
            'users' => $userTable->html()->ajax([
                'url' => route('datatables.companies.users', $company)
            ]),
            'addresses' => $addressDatatable->html()->ajax([
                'url' => route('datatables.companies.addresses', $company)
            ]),
        ];

        event(new CompanyViewed($company));

        return view('company::show', compact('company', 'form', 'datatables'));
    }

    /**
     * Show the form for editing Company.
     *
     * @param Company $company
     * @param UserDatatable $userTable
     * @param AddressDatatable $addressDatatable
     * @return Response
     */
    public function edit(Company $company, UserDatatable $userTable, AddressDatatable $addressDatatable)
    {
        $forms = [
            'company' => $this->form(EditCompany::class, [
                'model' => $company,
                'method' => 'PUT',
                'url' => route('companies.update', $company),
            ]),
            'createAddress' => $this->form(CreateAddress::class, [
                'model' => $company,
                'method' => 'POST',
                'url' => route('companies.createAddress', $company),
            ]),
        ];

        $datatables = [
            'users' => $userTable->html()->ajax([
                'url' => route('datatables.companies.users', $company)
            ]),
            'addresses' => $addressDatatable->html()->ajax([
                'url' => route('datatables.companies.addresses', $company)
            ]),
        ];

        event(new CompanyEditing($company));

        return view('company::edit', compact('company', 'forms', 'datatables'));
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
     * Update Company.
     *
     * @param Company $company
     * @param CompanyFormRequest $request
     * @return Response
     */
    public function update(Company $company, CompanyFormRequest $request)
    {
        $company->fill($request->validated())->save();

        event(new CompanyUpdated($company));

        flash(trans('update-company-success'))->success()->important();

        return redirect()->route('companies.edit', $company);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CompanyDatatable $companyTable
     * @return Response
     */
    public function create(CompanyDatatable $companyTable)
    {
        $forms = [
            'company' => $this->form(CreateCompany::class, [
                'method' => 'POST',
                'url' => route('companies.store'),
            ]),
        ];

        $datatables = [
            'companies' => $companyTable->html()->ajax([
                'url' => route('datatables.companies.index')
            ]),
        ];

        event(new CompanyCreating);

        return view('company::create', compact('forms', 'datatables'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CompanyFormRequest $request
     * @return Response
     */
    public function store(CompanyFormRequest $request)
    {
        $data = $request->validated();

        $company = Company::create([
            'slug' => $data['slug'],
            'name' => $data['name'],
        ]);

        event(new CompanyCreated($company));

        flash(trans('create-company-success'))->success()->important();

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
