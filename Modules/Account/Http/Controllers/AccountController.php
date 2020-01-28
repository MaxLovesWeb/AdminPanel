<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\User;
use Modules\Account\Entities\Account;
use Modules\Account\Entities\Permissions;
use Modules\Account\Tables\AccountDatatable;
use Modules\Account\Http\Resources\AccountDatatableResource;

use Modules\Account\Traits\CreateAccounts;
use Modules\Account\Traits\ReadAccounts;
use Modules\Account\Traits\UpdateAccounts;
use Modules\Account\Traits\DeleteAccounts;

use Modules\Account\Http\Requests\CreateAccountFormRequest;
use Modules\Account\Http\Requests\UpdateAccountFormRequest;
use Modules\Account\Http\Requests\DeleteAccountFormRequest;

class AccountController extends Controller
{
    use CreateAccounts, ReadAccounts, UpdateAccounts, DeleteAccounts;

    public function __construct()
    {
       // $this->authorizeResource(Account::class);
    }

    /**
     * Display a listing of the resource.
     * @param AccountDatatable $datatable
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(AccountDatatable $datatable, Request $request)
    {
        if($request->wantsJson()){

            $data = AccountDatatableResource::collection(
                Account::with( $datatable->relations )->get()
            );

            return $datatable->with('data', $data)->ajax();
        }

        $table = [
            'route' => route('accounts.index', $request->query()),
            'columns' => $datatable->columns(),
        ];

        return view('account::index', compact('table'));
    }

    /**
     * Display the specified resource.
     * @param  Account $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        $form = $this->buildShowAccountForm($account);

        $this->accountViewed($account);
        
        return view('account::show', compact('account', 'form'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * (account created with auth process)
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->buildCreateAccountForm();

        return view('account::create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  CreateAccountFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAccountFormRequest $request)
    {
        $account = $this->createAccount($request->user(), $request->validated());

        return $this->accountCreated($account, $request) 
                        ?: redirect()->route('accounts.edit', $account);
    }

    /**
     * Show the form for editing Account.
     * @param Account $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        $form = $this->buildUpdateAccountForm($account);

        return view('account::edit', compact('account', 'form'));
    }

    /**
     * Update the account data.
     * @param Account $account
     * @param UpdateAccountFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Account $account, UpdateAccountFormRequest $request)
    {
        $this->updateAccount($account, $request->all());

        $this->accountUpdated($account);

        return redirect()->route('accounts.edit', $account);
    }

    /**
     * Show the account destroy form.
     * @param  Account $account
     * @return \Illuminate\Http\Response
     */
    public function confirmDelete(Account $account = null)
    {
        $account = $account ?? Auth::user()->account;

        $form = $this->buildDeleteAccountForm($account);

        return view('account::destroy', compact('account', 'form'));
    }

    /**
     * Remove the specified resource from storage.
     * @param  Account $account
     * @param  DeleteAccountFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account, DeleteAccountFormRequest $request)
    {
        $this->deleteAccount($account);

        $this->accountDeleted($request);

        return redirect()->route('accounts.index');
    }

}
