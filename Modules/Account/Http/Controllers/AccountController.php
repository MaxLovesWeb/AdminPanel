<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Modules\Account\Entities\Account;
use Modules\Account\Tables\AccountDatatable;
use App\User;
use Modules\Account\Http\Resources\AccountDatatableResource;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Account\Forms\AccountForm;
use App\Forms\UserForm;

class AccountController extends Controller
{

    public function __construct()
    {
        //$this->middleware('can:update,account')->only('update', 'edit');
        $this->authorizeResource(Account::class, 'account', ['except' => 'index']);
    }

    /**
     * Display a listing of the resource.
     * @param AccountDatatable $datatable
     * @param Request $request
     * @return Response
     */
    public function index(AccountDatatable $datatable, Request $request)
    {
        if($request->wantsJson()){

            $data = AccountDatatableResource::collection(
                Account::with('user')->get()
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
     * Show the form for editing Account.
     * @param Account $account
     * @return Response
     */
    public function edit(Account $account, FormBuilder $formBuilder)
    {

        $accountForm = $formBuilder->create(AccountForm::class, [
            'method' => 'PUT',
            'url' => route('accounts.update', $account),
            'model' => $account
        ]);

        $userForm = $formBuilder->create(UserForm::class, [
            'method' => 'PUT',
            'url' => route('users.update', $account),
            'model' => $account->user
        ]);

        $userForm->remove('password');

        return view('account::edit', compact('account', 'accountForm', 'userForm'));
    }

    /**
     * Update the account data.
     * @param Account $account
     * @param Request $request
     * @return Response
     */
    public function update(Account $account, Request $request)
    {

        $validated = $request->validate(Account::$rules);

        $account->update($validated);

        return redirect()->route('accounts.edit', $account);
    }

}
