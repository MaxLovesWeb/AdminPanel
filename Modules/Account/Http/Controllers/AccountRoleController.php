<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Modules\Account\Entities\Role;
use Modules\Account\Entities\Account;
use Modules\Account\Tables\RoleDatatable;
use Modules\Account\Http\Resources\RoleDatatableResource;

use Modules\Account\Traits\CreateRoles;
use Modules\Account\Traits\ReadRoles;
use Modules\Account\Traits\UpdateRoles;
use Modules\Account\Traits\DeleteRoles;



class AccountRoleController extends Controller
{

    use CreateRoles, ReadRoles, UpdateRoles, DeleteRoles;
    
    public function __construct()
    {
        //$this->authorizeResource(Role::class);
    }

    /**
     * Display a listing of the resource.
     * @param RoleDatatable $datatable
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Account $account, RoleDatatable $datatable, Request $request)
    {

        if($request->wantsJson()){

            $roles = RoleDatatableResource::collection($account->roles);

            return $datatable->with('data', $roles)->ajax();
        }

        $table = [
            'route' => route('accounts.roles.index', $account),
            'columns' => $datatable->columns(),
        ];

        return view('role::index', compact('table'));
    }

    /**
     * Display the specified resource.
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {

        $form = $this->buildShowRoleForm($role);
        
        return $this->roleViewed($role) 
                        ?: view('role::show', compact('role', 'form'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->buildCreateRoleForm();

        return view('role::create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  CreateAccountFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $this->validateCreateRole($request);

        $role = $this->createRole($data);

        return $this->roleCreated($role, $request) 
                        ?: redirect()->route('roles.show', $role);
    }

    /**
     * Show the form for editing Role.
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $form = $this->buildUpdateRoleForm($role);

        return view('role::edit', compact('role', 'form'));
    }

    /**
     * Update the role.
     * @param Role $role
     * @param UpdateAccountFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role, Request $request)
    {
        $data = $this->validateCreateRole($request);

        $this->updateRole($role, $data);

        return $this->roleUpdated($role, $request) 
                        ?: redirect()->route('roles.edit', $role);
    }

    /**
     * Show the role destroy form.
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function confirmDelete(Role $role)
    {
        $form = $this->buildDeleteRoleForm($role);

        return view('role::destroy', compact('role', 'form'));
    }

    /**
     * Remove the specified resource from storage.
     * @param  Role $role
     * @param  DeleteAccountFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role, Request $request)
    {
        $this->deleteRole($role);

        return $this->roleDeleted($request) 
                        ?: redirect()->route('roles.index');
    }

}
